<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class frontendController extends Controller
{
    public function showMessage(){
        $messages = DB::table('messages')->get();
        return view('messages.frontendMessages',['messages'=>$messages]);
    }
}
