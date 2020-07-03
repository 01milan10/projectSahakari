<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class usersController extends Controller
{
    //User Controller
    public function showRegisterForm()
    {
        return view('User.addUser');
    }

    public function addUser(Request $request)
    {
        if ($this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ])) {
            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);

            Alert::success('Add User', 'New User Added Successfully');
        } else {
            Alert::error('Add User', 'Adding User Failed');
        }

        return redirect('/addUser');
    }

    public function listUser()
    {
        $data = DB::table('users')->get();
        return view('User.listUser', ['data' => $data]);
    }

    public function deleteUser($id)
    {
        if (User::find($id)->delete()) {
            Alert::success('Delete User', 'User Removed Successfully');
        } else {
            Alert::error('Delete User', 'User Could Not Be Removed');
        }

        return redirect()->back();
    }

    public function showUpdateForm($id)
    {
        $user = User::find($id);
        return view('User.updateUser', ['user' => $user]);
    }

    public function updateUser(Request $request, $id)
    {
        $update = [
            'name' => $request['name'],
            'email' => $request['email'],
        ];
        if (User::find($id)->update($update)) {
            Alert::success('Edit Credentials', 'Updating Credentials Successful');
        } else {
            Alert::error('Edit Credentials', 'Updating Credentials Failed');
        }
        return redirect('/listUser');
    }
    public function showResetForm($id)
    {
        $user = User::find($id);
        return view('User.resetPassword', ['user' => $user]);
    }
    public function resetPassword(Request $request, $id)
    {
        $update = [
            'password' => Hash::make($request['password']),
        ];
        if (User::find($id)->update($update)) {
            Alert::success('Success', 'Password is changed.');
        } else {
            Alert::error('Edit Credentials', 'Updating Credentials Failed');
        }
        return redirect('/listUser');
    }
}
