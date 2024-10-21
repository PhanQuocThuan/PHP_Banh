<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if (!$user) {
            return redirect('/login');
        }
        if ($user->Role != 'admin') {
            return redirect('/')->with('error', 'You do not have admin access.');
        }
        // $user = auth()->user();
        // if($user->Role !=='admin'){
        //     return redirect('/');
        // }
        // if (Auth::check() && Auth::user()->Role == 'admin') {
        //     return $next($request);
        // }
        return $next($request);
        // return redirect('/home')->with('error', 'You do not have admin access.');
    }
}
