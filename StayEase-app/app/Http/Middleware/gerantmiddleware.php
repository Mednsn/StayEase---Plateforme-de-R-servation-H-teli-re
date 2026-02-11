<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class gerantmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd($request);
         if(!Auth::check()){
            return redirect('/longin');
        }
        $user = auth::user();
        
        if($user->role->name !='gerant'){
            // dd($user->role->name);
           return redirect('/longin');
        }


        return $next($request);
    }
}
