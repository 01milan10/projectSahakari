<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Feature;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class FeatureController extends Controller
{
    public function index()
    {
        return response()->json(Feature::all(), 200);
    }

    public function create()
    {
        return view('features.create', ['features' => Feature::orderBy('created_at', "DESC")->get()]);
    }

    public function store(Request $request)
    {
        $this->validation(request());
        if (request()->hasFile('image')) {
            $imageName = request('title') . '.' . request('image')->getClientOriginalExtension();
            $input = [
                'title' => request('title'),
                'description' => strip_tags(request('description')),
                'image' => $imageName
            ];
            Feature::create($input);
            Alert::success('Success', 'Feature added');
            request('image')->move(public_path('/uploaded_images/services_images/'), $imageName);
            return back();
        } else {
            Alert::success('Failed', 'Failed to add feature');
            return back();
        }
    }
    public function destroy(Feature $feature)
    {
        if ($feature->delete()) {
            $imagePath = public_path("uploaded_images/services_images/") . $feature->image;
            if (file_exists($imagePath)) {
                @unlink($imagePath);
                Alert::success('Success', 'Feature deleted');
                return redirect('/features/create');
            } else {
                Alert::error('Failed', 'Could not delete');
                return redirect('/features/create');
            }
        } else {
            Alert::error('Failed', 'Could not delete');
            return redirect('/features/create');
        }
    }
    public function show(Feature $feature)
    {
        return view('features.show', ['feature' => $feature]);
    }
    public function edit(Feature $feature)
    {
        return view('features.edit', ['feature' => $feature]);
    }
    public function update(Feature $feature)
    {
        $id = $feature->id;
        if (request()->hasFile('image')) {
            $this->validation(request());
            $imageName = request('title') . '.' . request('image')->getClientOriginalExtension();
            $update = [
                'title' => request('title'),
                'description' => strip_tags(request('description')),
                'image' => $imageName
            ];
            if ($feature->update($update)) {
                request()->file('image')->move(public_path('/uploaded_images/services_images/'), $imageName);
                Alert::success('Success', 'Changes saved');
                return Redirect::route('show.feature', ['feature' => $feature->id]);
            } else {
                Alert::error('Failed', 'Changes could not be saved');
                return Redirect::route('show.feature', ['feature' => $feature->id]);
            }
        } else {
            $this->validate(request(), [
                'title' => 'required|min:5',
                'description' => 'required|min:15',
            ]);
            $update = [
                'title' => request('title'),
                'description' => strip_tags(request('description')),
            ];
            if ($feature->update($update)) {
                Alert::success('Success', 'Changes saved');
                return Redirect::route('show.feature', ['feature' => $feature->id]);
            } else {
                Alert::error('Failed', 'Changes could not be saved');
                return Redirect::route('show.feature', ['feature' => $feature->id]);
            }
        }
        return Redirect::route('show.feature', ['feature' => $feature->id]);
    }
    private function validation($data)
    {
        $rules = [
            'title' => 'required|min:5',
            'description' => 'required|min:15',
            'image' => 'required|mimes:jpg,png,jpeg,bmp'
        ];
        return $this->validate($data, $rules);
    }
}
