<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use Symfony\Component\Routing\Route;

class AuthController extends Controller
{
    public function register(UserRequest $request){
        sleep(1);
        // $fields = $request->validate([
        //     'name' => ['required', 'max:255'],
        //     'email' => ['required', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'confirmed']
        // ]);
        $validated = $request->validated();
        $user = User::query()->create($validated);
        Auth::login($user);
        return to_route('home');
    }
}
