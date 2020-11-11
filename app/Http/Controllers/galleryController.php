<?php

namespace App\Http\Controllers;

use App\Http\Resources\Gallery as galleryResource;
use App\ImageGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class galleryController extends Controller
{
    //Gallery Controller

    public function getImages($paginate)
    {
        if ($paginate == 0) {
            $gallery = ImageGallery::all()->groupBy('category', true);
        } else {
            $gallery = ImageGallery::inRandomOrder()->limit($paginate)->get();
            return $gallery;
        }
        return galleryResource::collection($gallery);
    }
    public function showGallery()
    {
        $images = DB::table('image_gallery')->get();
        return view('gallery.backendGallery', ['images' => $images]);
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:4',
            'category' => 'required|unique:image_gallery',
            'image' => 'required',
        ]);
        if (count($request->file('image')) > 20) {
            Alert::Error('Failed', 'Maximum 20 photos');
            return back();
        } else if ($request->hasFile('image') && count($request->file('image')) <= 20) {
            $images = $request->file('image');
            foreach ($images as $image) {
                $input['image'] =  $image->getClientOriginalName();
                $image->move(public_path('uploaded_images/gallery'), $input['image']);

                $input['category'] = $request->category;
                $input['title'] = $request->title;
                $input['category'] = $request->category;
                if (ImageGallery::create($input)) {
                    Alert::success('success', 'Image Uploaded Successfully.');
                } else {
                    Alert::Error("Failed", 'Image not uploaded');
                    return back();
                }
            }
            return back();
        } else {
            Alert::Error('Failed', 'File not found');
            return back();
        }
    }

    public function delete($id)
    {
        $file = ImageGallery::find($id);
        $imageName = $file->image;
        $imagePath = public_path('uploaded_images/gallery/') . $imageName;
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
