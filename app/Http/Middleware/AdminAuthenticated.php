<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //be van -e lépve és a is_admin = 1 
        if(!Auth::check() || ( Auth::check() && Auth::user()->is_admin != 1 )  ){
            return redirect(route('admin.login'));
        }
         
        return $next($request);
 
        
    }
}