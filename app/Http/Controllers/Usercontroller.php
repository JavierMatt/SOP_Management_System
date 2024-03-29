<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

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
        return redirect()->route('login')->with('success', 'User created successfully');
    }
    public function showuser()
    {
        $users = User::all();
        return view('usermanagement',compact('users'));
    }
    public function userManagement()
    {
        $userFiles = User::all();
        return view('userManagement', compact('userFiles'));
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
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
            return Redirect::route('showuser')->with('error', 'User not found');
        }

        $user->role = ($user->role === 'admin') ? 'user' : 'admin';
        $user->save();

        return Redirect::route('showuser')->with('success', 'User role switched successfully');
    }

}
