<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Resources\Committee as committeeResource;
use App\Committee;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;


class committeeController extends Controller
{

    public function getTeam($paginate)
    {
        if ($paginate == 0) {
            $team = Committee::all();
        } else {
            $team = Committee::paginate($paginate);
        }
        return committeeResource::collection($team);
    }

    public function showTeamForm()
    {
        $data = Committee::all();
        return view('team.backendTeam', ['data' => $data]);
    }
    public function addTeam(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'designation' => 'required|min:3',
            'phone' => 'required|numeric|max:10|min:7',
            'email' => 'required|email:rfc',
            'representation' => 'required|min:3',
            'image' => 'required|image',

        ]);
        $input['name'] = $request->name;
        $input['designation'] = $request->designation;
        $input['phone'] = $request->phone;
        $input['email'] = $request->email;
        $input['representation'] = $request->representation;
        $input['facebook'] = $request->facebook ? $this->makeLink($request->facebook) : '';
        $input['gmail'] = $request->gmail  ? $this->makeLink($request->gmail) : '';

        $image_name = $request->name . '.' . $request->file('image')->getClientOriginalExtension();
        $input['image'] = $image_name;

        if (Committee::create($input)) {
            $new_image = Image::make($request->file('image')->getRealPath());
            $resized_image = $new_image->resize(500, 500);
            $resized_image->save(public_path('uploaded_images/team_avatar/') . $image_name);
            Alert::success("Success", 'Team member added successfully');
        } else {
            Alert::error("Error", 'Failed to add team member');
        }
        return back();
    }

    public function deleteTeam($id)
    {
        if (Committee::find($id)->delete()) {
            Alert::Success("Success", 'Deleted successfully');
        }
        return back();
    }

    public function showUpdateForm($id)
    {
        $data = Committee::find($id);
        return view('team.teamUpdateForm', ['data' => $data]);
    }

    public function updateTeam(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'designation' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'representation' => 'required',
        ]);
        $currentUser = Committee::find($id);
        if ($request->hasFile('image')) {
            $image = Image::make($request->file('image')->getRealPath());
            $resized_image = $image->resize(500, 500);
            $image_name = $request->name . '.' . $request->file('image')->getClientOriginalExtension();
        } else {
            $image_name = $currentUser->image;
        }
        $update = [
            'name' => $request['name'],
            'designation' => $request['designation'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'representation' => $request['representation'],
            'image' => $image_name,
            'facebook' => $this->makeLink(request('facebook')),
            'gmail' => $this->makeLink(request('gmail')),
        ];
        if ($currentUser->update($update)) {
            if ($request->hasFile('image')) {
                $resized_image->save(public_path('uploaded_images/team_avatar/') . $image_name);
            }
            Alert::success('Success', 'Updating Successful');
        } else {
            Alert::error('Error', 'Updating Unsuccessful');
        }
        return redirect('/team');
    }
    private function makeLink($data)
    {
        if (!Str::contains($data, 'https://')) {
            return 'https://' . $data;
        } else {
            return $data;
        }
    }
}
