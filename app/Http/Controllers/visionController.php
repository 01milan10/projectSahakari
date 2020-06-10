<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class visionController extends Controller
{
    public function showVisionForm(){
        return view('visionObjective.backendVisionObjective');
    }
    public function addVision(Request $request){
        $this->validate($request,[
           'vision'=>'required',
           'mission'=>'required',
           'subMission'=>'required',
        ]);

    }
}
