<?php

namespace App\Http\Middleware;

use Closure;

class CekTentor
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
        if(session('role') != 'tentor'){
            return redirect('/tentor/login');
        }

        return $next($request);
    }
}
