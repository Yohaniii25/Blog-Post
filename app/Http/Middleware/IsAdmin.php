<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if(Auth::user()->IsAdmin ()== ADMIN) {
        // if (auth()->user()->IsAdmin ()) {
        //     //redirect to admin page
        //     return $next($request);
        // } else {
        //     //redirect to user page
        //     return back();
        // }

        //check weather user log or not
        if (auth()->user()) {
            if (auth()->user()->IsAdmin() == ADMIN) {
                //redirect to admin page
                return $next($request);
            } else {
                return back();
            }
        } else {
            return back();
        }
    }
}
