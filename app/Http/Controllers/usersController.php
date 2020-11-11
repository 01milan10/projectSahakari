<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use RealRashid\SweetAlert\Facades\Alert;

class usersController extends Controller
{
    //User Controller
    public function create()
    {
        return view('User.addUser');
    }

    public function store(Request $request)
    {
        $this->authorize('create', User::class);

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

    public function index()
    {
        $users = User::all();
        return view('User.listUser', ['users' => $users]);
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        if ($user->delete()) {
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

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $update = [
            'name' => $request['name'],
            'email' => $request['email'],
        ];
        if ($user->update($update)) {
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
    public function resetPassword(Request $request, User $user)
    {
        $this->authorize('resetPassword', $user);

        $this->validate($request, [
            'password' => 'required|confirmed|min:8',
        ]);
        $update = [
            'password' => Hash::make($request['password']),
        ];
        if ($user->update($update)) {
            Alert::success('Success', 'Password is changed.');
            return redirect('/listUser');
        }
    }
    public function changeAvatar(Request $request, $id)
    {
        $this->validate($request, [
            'avatar' => 'required'
        ]);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $user = User::find($id);
            $userName = $user->name;
            $fileName = $userName . '.' . $avatar->getClientOriginalExtension();
            $new_avatar = Image::make($avatar->getRealPath());
            $resized_avatar = $new_avatar->resize(200, 200);
            $update = [
                'image' => $fileName,
            ];
            if ($user->update($update)) {
                $resized_avatar->save(public_path('/uploaded_images/team_avatar/profile_pictures/') . $fileName);
                Alert::Success("Success", "Profile picture changed");
                return back();
            } else {
                Alert::Error("Failed", "Profile picture not changed");
                return back();
            }
        } else {
            Alert::Error('Failed', 'Image not found');
            return back();
        }

        return back();
    }
}
