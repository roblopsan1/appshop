<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddlewere
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
        
        //!auth()->check() Permite saber si un usario ha iniciado sesión
      
        if (!auth()->user()->admin){
            return redirect('/');
        }
        return $next($request);
    }
}
