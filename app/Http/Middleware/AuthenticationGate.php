<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticationGate
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
        $user=$request->session()->get('user');
        if(!is_null($user)){
            return $next($request);
        }
        else{
            session()->flash('warning','Please login to continue');
            $intendedUrl=$request->path();
            return redirect('login?next='.$intendedUrl);
        }
    }
}
