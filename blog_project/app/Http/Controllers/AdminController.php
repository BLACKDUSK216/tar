<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }
    public function dashboard()
    {
        return view('admin.dashboard'); 
    }
    public function bookings()
    {
        $bookings = DB::select('
            SELECT b.booking_id, b.id AS booking_id, d.name AS destination_name,
                   b.booking_date, b.travel_date, b.status, b.created_at, b.updated_at
            FROM bookings b
            JOIN destinations d ON b.destination_id = d.destination_id
        ');
    
        return view('admin.bookings', ['bookings' => $bookings]);
    }
    

    public function destinations()
    {
        $destinations = DB::table('destinations')->get();

        return view('admin.destinations', ['destinations' => $destinations]);
    }

    public function users()
    {
        $users = DB::table('users')->where('id', '!=', 1)->get();
        return view('admin.users', compact('users'));
    }
    
    
    public function tracking()
    {
        $trackingData = DB::table('live_tracking')->get();

        return view('admin.tracking', ['trackingData' => $trackingData]);
    }
  public function employee()
{
    $employees = DB::select('SELECT * FROM employees');
    return view('admin.employee', ['employees' => $employees]);
}
public function feedback()
    {
        $feedbacks = DB::table('feedbacks')->get();
        return view('admin.feedback', ['feedbacks' => $feedbacks]);
    }

}
