<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Inbox;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class backendController extends Controller
{
    public function inboxMessages()
    {
        $messages = Inbox::orderBy('created_at', 'DESC')->paginate(15);
        return view('inbox.inbox', ['messages' => $messages,]);
    }

    public function deleteMessage($id)
    {
        if (Inbox::find($id)->delete()) {
            Alert::Success("Success", "Message deleted");
            return back();
        } else {
            Alert::Error("Failed", "Message not deleted");
            return back();
        }
    }

    public function sendMessage(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $input = new Inbox;
        $input->sender_name = $request['name'];
        $input->sender_email = $request['email'];
        $input->message_subject = $request['subject'];
        $input->message = $request['message'];
        $input->badge = 'new';
        if ($input->save()) {
            return back();
        }
    }
    public function makeOld($id)
    {
        $message = Inbox::find($id);
        $message->badge = null;
        if ($message->save()) {
            return back();
        }
    }
    public function newMessageCounter()
    {
        $newMessageCount = Inbox::where('badge', '=', 'new')->count();
        return $newMessageCount;
    }
}
