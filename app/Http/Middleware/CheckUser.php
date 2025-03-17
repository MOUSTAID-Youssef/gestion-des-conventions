<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUser
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/')->with('error', 'Vous devez être connecté.');
        }

        $user = Auth::user();

        if ($user->privilege === 'user') {
            return $next($request);
        }

        return redirect('/')->with('error', 'Accès interdit. Vous n\'avez pas les privilèges nécessaires.');
    }
}
