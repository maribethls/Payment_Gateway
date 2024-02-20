<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomGuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {

            $user = User::where('email', Auth::user()->email)->first();

            if ($user->role === 'user') {
                return redirect()->route('user');
            } elseif ($user->role === 'admin') {
                return redirect()->route('admin');
            }
        }

        return $next($request);
    }
}
