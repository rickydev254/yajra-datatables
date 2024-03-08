<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the authenticated user has the admin role
        if ($request->user() && $request->user()->roles->contains('name', 'admin')) {
            return $next($request);
        }

        // Redirect or return a response for unauthorized access
        return redirect()->route('home')->with('error', 'Unauthorized access.');
    }
}
