<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use App\Comment;
use App\Http\Resources\Comment as CommentResource;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class commentController extends Controller
{
    public function showCommentForm()
    {
        $comments = Comment::all();
        return view('testimonials.backendTestimonials', ['comments' => $comments]);
    }

    public function addComment(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'designation' => 'required|min:4',
            'email' => 'required:email:rfc',
            'comment' => 'required|min:5',
            'image' => 'required|image',
        ]);

        $input['name'] = $request['name'];
        $input['designation'] = $request['designation'];
        $input['email'] = $request['email'];

        $comment = $request['comment'];
        $stripped_comment = strip_tags($comment);
        $input['comment'] = $stripped_comment;

        $image = $request->file('image');
        $imageName = $request->name . '.' . $request->file('image')->getClientOriginalExtension();
        $input['image'] = '/uploaded_images/client_avatar/' . $imageName;

        if (Comment::create($input)) {
            $new_image = Image::make($image->getRealPath());
            $resized_image = $new_image->resize(200, 200);
            $resized_image->save(public_path('uploaded_images/client_avatar/' . $imageName));
            Alert::Success('Success', 'Comment Added');
        } else {
            Alert::Error('Error', 'Failed');
        }
        return back();
    }
    public function deleteComment($id)
    {
        if (Comment::find($id)->delete()) {
            Alert::Success('Success', 'Comment Deleted');
        } else {
            Alert::Error('Error', 'Failed');
        }
        return back();
    }

    public function getComments($pagination)
    {
        if ($pagination == 0) {
            $comments =  Comment::all();
        } else {
            $comments =  Comment::paginate($pagination);
        }
        return CommentResource::collection($comments);
    }
}
