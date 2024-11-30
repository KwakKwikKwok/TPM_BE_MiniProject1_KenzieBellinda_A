<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;

Route::controller(GuestController::class)->group(function() {
    Route::get('/', 'getHome')->name('getHome');
    Route::post('/guests', 'createGuest')->name('createGuest');
    Route::get('/edit-reservation/{guest_id}', 'getEditReservation')->name('getEditReservation');
    Route::post('/edit-reservation/{guest_id}', 'editReservation')->name('editReservation');
    Route::post('/delete-reservation/{guest_id}', 'deleteReservation')->name('deleteReservation');
});


