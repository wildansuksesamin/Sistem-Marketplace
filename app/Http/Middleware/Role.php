<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use redirect;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$Roles)
    {
        if (in_array($request->user()->role, $Roles)) {
            return $next($request);
        } 

        if (Auth::user()->role == 'admin') {
            return redirect('/admin');
        } elseif (Auth::user()->role == 'member') {
            return redirect('/');
        }
    }
}
