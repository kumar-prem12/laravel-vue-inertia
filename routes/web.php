<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    // sleep(2);
    return Inertia::render('Home');
})->name('home');
// Route::get('/about', function () {
//     sleep(2);
//     return inertia('About',['user' => 'Prem']);
//     // return Inertia::render('About');
// });
Route::inertia('/about', 'About', ['user' => 'Prem'])->name('about');
Route::inertia('/register', 'Auth/Register')->name('register');
Route::post('/register', [AuthController::class, 'register']);
