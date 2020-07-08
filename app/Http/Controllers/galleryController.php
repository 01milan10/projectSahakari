<?php

namespace App\Http\Controllers;

use App\ImageGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class galleryController extends Controller
{
    //Gallery Controller
    public function showGallery()
    {
        $images = DB::table('image_gallery')->get();
        return view('gallery.backendGallery', ['images' => $images]);
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input['image'] = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploaded_images'), $input['image']);

        $input['category'] = $request->category;

        $input['title'] = $request->title;
        $input['category'] = $request->category;
        if (ImageGallery::create($input)) {

            Alert::success('success', 'Image Uploaded Successfully.');
            return back();
        }
    }

    public function delete($id)
    {
        $file = ImageGallery::find($id);
        $imageName = $file->image;
        $imagePath = public_path('uploaded_images/') . $imageName;
        if (file_exists($imagePath)) {
            @unlink($imagePath);
            ImageGallery::find($id)->delete();
            Alert::success('success', 'Image Deleted Successfully.');
        } else {
            Alert::error('Error', 'Image Could Not Be Deleted.');
        }
        return back();
    }
}
