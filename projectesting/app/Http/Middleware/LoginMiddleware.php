<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class LoginMiddleware
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
        if(Session::has("user_role") && session("user_role")['user_type_id'] == 1)
        {
            return redirect('/admin');
        }
        else if(Session::has("user_role") && session("user_role")['user_type_id'] == 2)
        {
            return redirect('/partner');
        }
        else if(Session::has("user_role") && session("user_role")['user_type_id'] == 3)
        {
            return redirect('/district');
        }
        else
        {
            return $next($request);
        }
    }
}
