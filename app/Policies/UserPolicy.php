<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function delete(User $request)
    {
        return $request->email === Auth::user()->email;
    }
}
