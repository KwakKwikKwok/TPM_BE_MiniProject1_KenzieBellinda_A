<?php

use App\Models\Guest;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $guests = Guest::with('reservations')->get();
    return view('guests.index', compact('guests')); 
});


Route::post('/guests', function (Request $request) {

    // $guest = Guest::create($request->only('name', 'email', 'phone'));

    $validated = $request->validate([
        'phone' => 'required',
        'reservation_time' => 'required|date',
        'seats' => 'required|integer|min:1',
        'name' => 'required',
        'email' => 'required|email'
    ]);
    
    $guest = Guest::create($request->only('name', 'email', 'phone'));

    Reservation::create([
        'reservation_time' => $request->reservation_time,
        'seats' => $request->seats,
        'reservation_type' => $request->reservation_type,
        'guest_id' => $guest->id
    ]);

    // Guest::create($validated);

    return redirect('/');
});


