<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if(auth()->user()->role == 'user'){
            return $next($request);    
        }elseif(auth()->user()->role == 'admin'){
            return $next($request);    
        }elseif(auth()->user()->role == 'super'){
            return $next($request); 
        }else{
			redirect()->to(route('login'));
		}
        
    }
}
