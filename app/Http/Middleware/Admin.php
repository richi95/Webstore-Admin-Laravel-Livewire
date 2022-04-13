<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//Auth::login($user)
//Auth::loginUsingId(1)
//Hash::make('11223344')

class Admin
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
        //if( !Auth::user()->is_admin ){
            //redirect
        //}
        // if($request->password == User::find(1)->password && $request->email == User::find(1)->email)
        return $next($request);
        // else
        // return redirect('/admin');
    }
}
