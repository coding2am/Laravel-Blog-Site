<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsManager
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
        foreach(Auth::user()->roles as $role){
            if($role->name == 'Manager' || $role->name == 'Supervisor')
            {
                return $next($request);
            }
            return redirect('/admin/normaluser');
        }
    }
}
