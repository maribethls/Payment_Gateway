<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('home');
        }

        $account = User::where('email', Auth::user()->email)->first();

        // Check if the stored IP address is different from the current one
        if ($request->session()->has('user_ip') && $request->session()->get('user_ip') !== $request->ip()) {
            // Invalidate the session
            auth()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('getLogin')->withErrors(['ip_mismatch' => 'Your session has been invalidated. Please log in again.']);
        }

        // Update the stored IP address
        $request->session()->put('user_ip', $request->ip());

        // Redirect logic based on user type
        if ($account->role === 'user' && ($request->route()->getName() === 'admin')) {
            return redirect()->route('user');
        }

        if ($account->role === 'admin' && ($request->route()->getName() === 'user')) {
            return redirect()->route('admin');
        }

        return $next($request);
    }
}
