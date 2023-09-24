<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // userot sto ni e logiran 
        if($request->user()->role_id == 1) {
            return redirect()->route('admin');
        } 
        
         if ($request->user()->role_id == 2) {
            return redirect()->route('editor');
        } 
        
        if ($request->user()->role_id == 3){
            return redirect()->route('regular');
        }

        return $next($request); // da se izvrsi rutata sledna 
    }
}
