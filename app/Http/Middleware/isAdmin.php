<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Support\Facades\Auth;

class isAdmin
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
      //Response when a none admin tries to enter a admin only page.

      if(!Auth::user() || !Auth::user()->is_admin){
        Session::flash('error' , 'You dont belong here!');
        return redirect()->back();
      }
        return $next($request);
    }
}
