<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class AdminMiddleware
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
        //1. user harus terautentifikasi
        //2. autentikasi user harus sama admin

        if(Sentinel::check()&& Sentinel::getUser()->roles()->first()->slug == 'admin')

            return $next($request);
        else
            return redirect('/');
    }
}
