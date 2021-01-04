<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ( session('user_type') === 'ADMIN' ) {
            if(session('status') == 1){
                return $next($request);
            }
            else{
                session()->flush();
                return redirect()->route('login');
            }
        }
        else if ( session('user_type') === 'PATIENT' ) {
            if(session('status') == 1){
                return $next($request);
            }
            else{
                session()->flush();
                return redirect()->route('login');
            }
        }
        else if ( session('user_type') === 'DOCTOR' ) {
            if(session('status') == 1){
                return $next($request);
            }
                else{
                    session()->flush();
                    return redirect()->route('login');
            }   
        }
        else{
            session()->flush();
            return redirect()->route('login');
        }
        
    }
}
