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
        if(auth()->user()->role == 'admin'){
            return $next($request);    
        }elseif(auth()->user()->role == 'dumas'){
            return $next($request); 
        }elseif(auth()->user()->role == 'gratifikasi'){
            return $next($request); 
        }elseif(auth()->user()->role == 'super'){
            return $next($request); 
        }
        
    }
}
