<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class Usercontroller extends Controller
{
    public function toLogin()
    {
        return view('login');
    }
    public function toRegister()
    {
        return view('register');
    }
    public function userLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('adminpage'); // Redirect to admin page
            } elseif ($user->role === 'user') {
                return redirect()->route('userpage'); // Redirect to user page
            }
        }

        return back()->withErrors('Username or password not valid');
    }
    public function userRegister(Request $request)
    {
        // dd($request);
        // Validate input data
        $validatedData = $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|in:admin,user', // Ensure role is either 'admin' or 'user'
        ]);

        // Hash the password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Insert user data into the database
        $user = User::create($validatedData);

        // Redirect or return a response
        return redirect()->route('userManagement')->with('success', 'User created successfully');
    }

    // public function userChangePassword() {
    //     return view("userChangePassword");
    // }

    public function userManagement()
    {
        $userFiles = User::all();
        return view('userManagement', compact('userFiles'));
    }


    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('showuser')->with('success', 'User deleted successfully');
        } else {
            // If the user is not found, return an error message
            return redirect()->route('showuser')->with('error', 'User not found');
        }
    }

    public function switchRole($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('userManagement')->with('error', 'User not found');
        }

        if($user->username === 'SUPERADMIN'){
            return redirect()->route('userManagement')->with('error', 'Can not change superadmin role');
        }

        $user->role = ($user->role === 'admin') ? 'user' : 'admin';
        $user->save();

        return redirect('userManagement');
        
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect()->back();
    }

    public function showForm(){
        return view('changePass');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed'
        ]);

        $user = Auth::user();

        // Check if the old password matches the user's current password
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('error-N', 'Current password is incorrect');
        }

        // Check if the new password is the same as the current password
        if (Hash::check($request->new_password, $user->password)) {
            return redirect()->back()->with('error', 'Can\'t change to current password');
        }

        // Update the user's password with the new hashed password
        $user->password = Hash::make($request->new_password);
        $user->save();

        Session::flush();
        Auth::logout();
        return redirect()->route('login')->with('success', 'Password Changed');
    }
}