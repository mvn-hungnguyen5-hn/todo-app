<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CheckAdmin
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
        //return $next($request);
        if(Auth::check() && Auth::user()->level == '1'){
            return $next($request);
            
        }else if(!Auth::check() || Auth::user()->level == '0')
        {
            return redirect('login')->with('error','Vui lòng login tài khoản có quyền quản trị');
            
        }
    }
}
