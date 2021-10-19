<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Cek_login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$role)
    {
        if (Auth::check() && in_array($request->user()->is_admin,$role)){
            return $next($request);
        }
        // $roles = array_slice(func_get_args(), 2);

        // foreach ($roles as $role) {
        //     $user = Auth::user();
        //     if ($user->is_admin == $role) {
        //         return $next($request);
        //     }
        // }

        return redirect('/')->with('loginError', "Anda tidak dapat mengakses halaman ini!, Silahkan Login sebagai admin");
    }
}
