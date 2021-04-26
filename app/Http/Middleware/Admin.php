<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user() == 'Admin')
        {
            return redirect(RouteServiceProvider::Admin);
        }
        else{
            return redirect('/home')->with('status','you are not login to adminpanel');
        }
       
    }
}
