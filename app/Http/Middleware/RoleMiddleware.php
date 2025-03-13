<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::check() && Auth::user()->privilege == $role) {
            return $next($request); // User has the correct role
        }

        // If user doesn't have the correct role, redirect them
        return redirect()->route('utilisateur.index');
    }
}
