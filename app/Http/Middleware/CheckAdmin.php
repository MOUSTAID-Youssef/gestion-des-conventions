<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('redirect');
        }
        $user = Auth::user();

        if ($user->privilege === 'admin') {
            return $next($request);
        }
        return redirect()->route('redirect');

    }
}
