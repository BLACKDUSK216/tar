<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request) 
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = DB::table('admin')->where('username', $username)->first();

        if (!$user) {
            return redirect('/')->with('message', 'Incorrect Username');
        }

        if (Hash::check($password, $user->password)) {
            return redirect()->route('DashBoard')->with('message', 'Login successful');
        } else {
            return redirect('/')->with('message', 'Incorrect password');
        }
    }
}
