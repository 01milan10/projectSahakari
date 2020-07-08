<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Committee;
use RealRashid\SweetAlert\Facades\Alert;

class committeeController extends Controller
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
        $input['name'] = $request->name;
        $input['designation'] = $request->designation;
        $input['phone'] = $request->phone;
        $input['email'] = $request->email;
        $input['representation'] = $request->representation;
        $input['facebook'] = $request->facebook ? $request->facebook : '';
        $input['gmail'] = $request->gmail  ? $request->gmail : '';
        $input['image'] = $request->file('image')->getClientOriginalName();

        if (Committee::create($input)) {

            // dd($input);
            $request->image->move(public_path('uploaded_images/team_avatar'), $input['image']);
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
        ]);
        $currentUser = Committee::find($id);
        $update = [
            'name' => $request['name'],
            'designation' => $request['designation'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'representation' => $request['representation'],
            'image' => $request['image'] ? $request->image->getClientOriginalName() : $currentUser->image
        ];
        if ($currentUser->update($update)) {
            Alert::success('Success', 'Updating Successful');
        } else {
            Alert::error('Error', 'Updating Unsuccessful');
        }
        return redirect('/team');
    }
}
