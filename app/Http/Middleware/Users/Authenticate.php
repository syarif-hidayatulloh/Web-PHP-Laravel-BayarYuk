<?php

namespace App\Http\Middleware\Users;

use Closure;
use Illuminate\Support\Facades\Session;

class Authenticate
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
        if (!Session::get('login')) {    		
			return $next($request);
		}else{
			if (!Session::get('level')) {
				return redirect('siswa/home');
            }
            else if(Session::get('level') == 'admin') {
                return redirect('admin/home');
            }
            else if(Session::get('level') == 'petugas') {
                return redirect('petugas/home');
            }
		}
    }
}
