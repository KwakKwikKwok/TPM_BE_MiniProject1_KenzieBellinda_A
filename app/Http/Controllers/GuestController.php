<?php

namespace App\Http\Controllers;

// use App\Models\Guest; // Import the Guest model
// use Illuminate\Http\Request;
// 
// class GuestController extends Controller
// {
//     public function showGuests()
//     {
//         // Retrieve all guests from the database
//         $guests = Guest::all();

//         // Return the view and pass the $guests data
//         return view('your-view-name', ['guests' => $guests]);
//     }
// }



use App\Models\Guest;
use App\Models\Reservation;
use Illuminate\Http\Request;
class GuestController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'reservation_time' => 'required|date',
            'seats' => 'required|integer|min:1',
            'reservation_type' => 'required|string',
        ]);

        $guest = Guest::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        Reservation::create([
            'guest_id' => $guest->id,
            'reservation_time' => $request->reservation_time,
            'seats' => $request->seats,
            'reservation_type' => $request->reservation_type,
        ]);


        return redirect('/');
    }
}