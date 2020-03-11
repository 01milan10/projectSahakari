<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class messagesController extends Controller
{
    //Messages Controller
    public function showMessageForm(){
        return view('messages.backendMessages');
    }

    public function uploadMessage(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'author'=>'required',
            'message'=>'required',
            'position'=>'required',
        ]);
        $input = [
            'title'=>  $request['title'],
            'message'=>  $request['message'],
            'author'=>  $request['author'],
            'position'=>  $request['position'],
        ];
        if(Message::create($input)){
            Alert::success('Success','Message Added.');
        }
        else{
            Alert::error('Error','Message Not Added');
        }
        return back();
    }
}
