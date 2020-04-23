<?php

namespace App\Http\Middleware\Users;

use Closure;
use Illuminate\Support\Facades\Session;

class SiswaMiddleware
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
			return redirect('/');
		}else{
			if (!Session::get('level')) {
				return $next($request);
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
