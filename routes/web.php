<?php

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $guests = Guest::with('reservations')->get();
    return view('guests.index', compact('guests')); 
});


Route::post('/guests', function (Request $request) {

    $validated = $request->validate([
        'phone' => 'required',
        'reservation_time' => 'required|date',
        'seats' => 'required|integer|min:1',
        'name' => 'required',
        'email' => 'required|email',
    ]);

    Guest::create($validated);

    return redirect('/');
});


