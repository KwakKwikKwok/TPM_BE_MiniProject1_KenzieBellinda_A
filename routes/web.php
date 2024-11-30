<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;

Route::get('/', [GuestController::class, 'getHome'])->name('getHome');
Route::post('/guests', [GuestController::class, 'createGuest'])->name('createGuest');



