<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuestController extends Controller
{
    public function getHome(){
        $guests = Guest::with('reservations')->get();
        return view('guests.index', compact('guests')); 
    }

        public function createGuest(Request $request){
            $request->validate([
            'name' => ["required","string"],
            'email' => ["required", "email"],
            'phone' => ["required", "string"],
            'reservation_time' => ["required", "date"],
            'seats' => ["required", "integer", "min:1"],
            'image_path' => ["required", "image"]
        ],[
            'name.required' => "Guest Name is required.",
            'email.required' => "Email is required.",
            'phone.required' => "Phone Number is required.",
            'reservation_time.required' => "Date and Time Reservation is required.",
            'seats.required' => "Input amount of seats needed",
            'seats.min' => "Amount of seats reserved can't be less than 1.",
            'image_path.image' => "This must be filled with image."
        ]);

        $now = now()->format('Y-m-d_H.i.s');
        $filename = $now.'_'.$request->file('image_path')->getClientOriginalName();
        Storage::disk('public')->putFileAs( $request->file('image_path'), $filename);

        $guest = Guest::create($request->only('name', 'email', 'phone'));    

        Reservation::create([
            'guest_id' => $guest->id,
            'reservation_time' => $request->reservation_time,
            'seats' => $request->seats,
            'image_path' => $filename
        ]);

        return redirect('/');
    }

    function getEditReservation($guest_id) {
        $guest = Guest::with('reservations')->findOrFail($guest_id);
        $reservation = Reservation::all();
        return view('guests.edit', compact('guest'));
    }

    public function editReservation(Request $request, $guest_id){

        $request->validate([
            'name' => ["required","string"],
            'email' => ["required", "email"],
            'phone' => ["required", "string"],
            'reservation_time' => ["required", "date"],
            'seats' => ["required", "integer", "min:1"],
            'image_path' => ["required", "image"]
        ],[
            'name.required' => "Guest Name is required.",
            'email.required' => "Email is required.",
            'phone.required' => "Phone Number is required.",
            'reservation_time.required' => "Date and Time Reservation is required.",
            'seats.required' => "Input amount of seats needed",
            'seats.min' => "Amount of seats reserved can't be less than 1.",
            'image_path.image' => "This must be filled with image."
        ]);
        
        $reservation = Reservation::where('guest_id', $guest_id)->firstOrFail(); 

        $guest = Guest::findOrFail($guest_id);
        
        Storage::disk('public')->delete($reservation->image_path);

        $now = now()->format('Y-m-d_H.i.s');
        $filename = $now.'_'.$request->file('image_path')->getClientOriginalName();
        Storage::disk('public')->putFileAs( $request->file('image_path'), $filename);
        
        $guest->update([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone
        ]);

        $reservation->update([
            "reservation_time" => $request->reservation_time,
            "seats" => $request->seats,
            "image_path" => $filename
        ]);

        return redirect(route('getHome'));
    }   

    function deleteReservation($guest_id) {
        $reservation = Reservation::findOrFail($guest_id);
        Storage::disk('public')->delete($reservation->image_path);
        Guest::destroy($guest_id);
        return redirect(route('getHome'));
    }
}
