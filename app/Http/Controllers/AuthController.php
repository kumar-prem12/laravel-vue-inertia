<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function register(UserRequest $request){
        // sleep(1);
        $validated = $request->validated();
        if($request->hasFile('avatar')){
           $validated['avatar'] = Storage::disk('public')->put('avatars', $request->avatar);
        }
        $user = User::query()->create($validated);
        Auth::login($user);
        // return to_route('dashboard')->with('message', 'User created successfully!');
        return to_route('dashboard')->with('toast', [
            'type' => 'success', // success | error | info
            'message' => 'User created successfully',
        ]);
    }

    public function login(Request $request){
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
            // return redirect()->route('dashboard');
            // return to_route('home');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
