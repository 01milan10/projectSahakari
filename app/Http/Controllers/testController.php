<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    public function login(Request $request)
    {
        dd($request);
    }

    public function showLoginForm()
    {
        return ("Login form displayed");
    }
}
