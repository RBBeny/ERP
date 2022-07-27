<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RHMiddleware
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
        if(auth()->check()){
            $tipo = auth()->user()->cveTipoUsuario;
            if($tipo == 8){
                return $next($request);
            }else{
                return segunRol($tipo);
            }
        }else{
            return redirect('/');
        }
        
        //return $next($request);
    }
}
