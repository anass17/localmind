<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Session;

class UserAuthentified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        // Check if the user is authenticated
        if (!Session::has('user_id')) {
            // If not authenticated, redirect to the login page
            return redirect()->route('login');
        }

        // If the user is authenticated, allow the request to proceed
        return $next($request);
    }
}
