<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRouteLogin
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
        //đăng nhập rồi, vào lại trang login
        //tùy user mà di chuyển đến trang index tương ứng
        if(Auth::check() && Auth::user()->level == '1'){
            return redirect()->route('admin.index');
        
        }elseif(Auth::check() && Auth::user()->level != '1'){
            return redirect()->route('todos.index');
        }
        else{
            return $next($request);
        }
    }
}
