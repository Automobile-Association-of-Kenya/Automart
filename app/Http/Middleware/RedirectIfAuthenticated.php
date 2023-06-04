<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $role = auth()->user()->role;
                if ($role === "dealer") {
                    return redirect(RouteServiceProvider::DEALER);
                }elseif ($role === "admin") {
                    return redirect(RouteServiceProvider::HOME);
                }elseif ($role === "buyer") {
                    return redirect(RouteServiceProvider::BUYER);
                }elseif ($role === "partner") {
                    return redirect(RouteServiceProvider::PARTNER);
                }
            }
        }

        return $next($request);
    }
}
