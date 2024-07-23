<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Booking;

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
        $bookings = DB::table('bookings')
            ->join('destinations', 'bookings.destination_id', '=', 'destinations.destination_id')
            ->select(
                'bookings.booking_id',
                'bookings.id as user_id',
                'destinations.name as destination_name',
                'bookings.booking_date',
                'bookings.travel_date',
                'bookings.status',
                'bookings.created_at',
                'bookings.updated_at'
            )
            ->get();

        return view('admin.bookings', compact('bookings'));
    }

    public function create()
    {
        return view('admin.bookings.create');
    }

    public function showBookings()
    {
        $bookings = Booking::all();
        return view('admin.bookings', compact('bookings'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'destination_id' => 'required|integer',
            'booking_date' => 'required|date',
            'travel_date' => 'required|date',
            'status' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        Booking::create($request->all());

        return response()->json(['success' => 'Booking added successfully']);
    }

    public function edit($id)
    {
        $booking = Booking::find($id);
        return response()->json($booking);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required|integer',
            'destination_id' => 'required|integer',
            'booking_date' => 'required|date',
            'travel_date' => 'required|date',
            'status' => 'required|string|max:20',
        ]);

        $booking = Booking::find($id);
        $booking->update($request->all());

        return response()->json(['success' => 'Booking updated successfully']);
    }

    public function destroy($id)
    {
        Booking::find($id)->delete();
        return response()->json(['success' => 'Booking deleted successfully']);
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

    public function blogs()
    {
        $blogs = DB::table('blogs')->get();
        return view('admin.blogs', ['blogs' => $blogs]);
    }

    public function comments()
    {
        $comments = DB::table('comments')->get();
        return view('admin.comments', ['comments' => $comments]);
    }
}
