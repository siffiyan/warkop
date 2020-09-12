<?php

namespace App\Http\Middleware;

use Closure;

class CekSiswa
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

        if(session('role') != 'siswa'){
            return redirect('/siswa/login');
        }

        return $next($request);
    }
}
