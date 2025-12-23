<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

 
Route::get('/', function (Request $request) {
    return inertia('Home', [
        'users' => User::when($request->search, function ($query) use ($request) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        })->paginate(6)->withQueryString(),
        'searchTerm' => $request->search,
        'can' => [
            'delete_user' => Auth::user() ? Auth::user()->can('delete', User::class) : null
        ]
    ]);
})->name('home');
// Route::get('/about', function () {
//     sleep(2);
//     return inertia('About',['user' => 'Prem']);
//     // return Inertia::render('About');
// });
// Route::inertia('/', 'Home', ['users' => User::paginate(6)])->name('home');
Route::inertia('/about', 'About', ['user' => 'Prem'])->name('about');

Route::middleware('auth')->group( function() {
    Route::inertia('/dashboard', 'Dashboard')->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('posts', PostController::class);
});

Route::middleware('guest')->group( function () {
    Route::inertia('/register', 'Auth/Register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::inertia('/login', 'Auth/Login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

