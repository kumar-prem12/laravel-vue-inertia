<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    sleep(2);
    return Inertia::render('Home');
});
// Route::get('/about', function () {
//     sleep(2);
//     return inertia('About',['user' => 'Prem']);
//     // return Inertia::render('About');
// });
Route::inertia('/about', 'About', ['user' => 'Prem']);
