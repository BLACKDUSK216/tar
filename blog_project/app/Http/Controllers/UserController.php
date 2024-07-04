<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\SessionLog;

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
            $sessionLog = new SessionLog();
            $sessionLog->user_id = $user->id;
            $sessionLog->user_agent = $request->header('User-Agent');
            $sessionLog->ip_address = $request->ip(); 
            $sessionLog->login_time = now();
            $sessionLog->cookie_id = $request->cookie('user_id');
            $sessionLog->save();
            if (!session()->has('user_id')) {
                session(['user_id' => $user->id]);
                session(['user_name' => $user->name]);
            }
            $minutes = 60 * 24 * 30;
            cookie()->queue(cookie('user_id', $user->id, $minutes));
            cookie()->queue(cookie('user_name', $user->name, $minutes));
            if ($user->email === 'admin@example.com') {
                return redirect()->route('admin.dashboard')->with('message', 'Login successful');
            } else {
                return view('user.user_dashboard', [
                    'username' => $user->name, 
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

        return redirect()->route('login')->with('message1', 'Registration successful, please login');
    }

    public function logout(Request $request)
    {
        if (session()->has('user_id')) {
            $userId = session('user_id');

            $sessionLog = SessionLog::where('user_id', $userId)
                ->orderByDesc('login_time')
                ->first();

            if ($sessionLog) {
                $sessionLog->logout_time = now();
                $sessionLog->save();
            }
            session()->forget(['user_id', 'user_name']);
            cookie()->queue(cookie()->forget('user_id'));
            cookie()->queue(cookie()->forget('user_name'));
        }

        return redirect('/login')->with('message', 'Logged out successfully');
    }
}
