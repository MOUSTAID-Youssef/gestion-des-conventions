<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPrivilege
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $privilege)
    {
        if (Auth::check() && Auth::user()->privilege === $privilege) {
            return $next($request);
        }

        return redirect()->route('utilisateur.login')->withErrors('Accès non autorisé.');
    }
}
