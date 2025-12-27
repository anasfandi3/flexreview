<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $username = $request->header('X-Username');
        $password = $request->header('X-Password');
        if (!($username === 'admin' && $password === 'admin')) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        return $next($request);
    }
}
