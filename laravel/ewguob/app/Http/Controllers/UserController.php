<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request) 
    {
        $username = $request->input('email');
        $password = $request->input('password');
    
        $user = User::where('email', $username)->first();
    
        if (!$user) {
            return redirect('/login')->with('message', 'Incorrect Email');
        }
    
        if (Hash::check($password, $user->password)) {
            if ($user->email === 'admin@example.com') {
                return redirect()->route('admin.dashboard')->with('message', 'Login successful');
            } else {
                return view('user_dashboard', [
                    'username' => $user->name, // Pass the username to the view
                ]);
            }
        } else {
            return redirect('/login')->with('message', 'Incorrect password');
        }
    }
    
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('login')->with('message', 'Registration successful, please login');
    }
    
}
