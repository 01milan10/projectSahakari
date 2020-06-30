<?php

namespace App\Http\Controllers;

use App\Committee;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class backendController extends Controller
{

    public function showTeamForm()
    {
        $data = Committee::all();
        return view('team.backendTeam', ['data' => $data]);
    }
    public function addTeam(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'designation' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'representation' => 'required',
            'image' => 'required',
        ]);
        if (Committee::create([
            'name' => $request['name'],
            'designation' => $request['designation'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'representation' => $request['representation'],
            'image' => $request['image'],
        ])) {
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
            'image' => 'required',
        ]);
        $update = [
            'name' => $request['name'],
            'designation' => $request['designation'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'representation' => $request['representation'],
            'image' => $request['image'],
        ];
        if (Committee::find($id)->update($update)) {
            Alert::success('Success', 'Updating Successful');
        }
        return redirect('/team');
    }
}
