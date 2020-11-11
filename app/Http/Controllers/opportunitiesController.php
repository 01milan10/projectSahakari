<?php

namespace App\Http\Controllers;

use App\Oppurtunity;
use App\Http\Resources\Oppurtunity as oppurtunityResource;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class opportunitiesController extends Controller
{
    //Opportunities controller

    public function getCareer()
    {
        $careers = Oppurtunity::all();
        return oppurtunityResource::collection($careers);
    }

    public function showOppurtunitiesForm()
    {
        return view('oppurtunities.backendOppurtunities');
    }

    public function addOppurtunities(Request $request)
    {
        $this->validate($request, [
            'opening' => 'required',
            'position' => 'required',
            'seat' => 'required|numeric',
            'requirement' => 'required',
        ]);
        $input = [
            'opening' => $request['opening'],
            'position' => $request['position'],
            'seat' => $request['seat'],
            'requirement' => $request['requirement'],
        ];
        Oppurtunity::create($input);
        Alert::success("Success", 'Job Posted Successfully.');
        return back();
    }

    public function listOppurtunities()
    {
        $opportunities = Oppurtunity::all();
        return view('oppurtunities.listOppurtunities', ['opportunities' => $opportunities]);
    }
    public function deleteOppurtunity($id)
    {
        Oppurtunity::find($id)->delete();
        Alert::success('Success', 'Opening Deleted Successfully');
        return back();
    }
}
