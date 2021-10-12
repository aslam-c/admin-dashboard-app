<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class AuthorizationGate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$roleRequired)
    {
        $user=$request->session()->get('user');
        if(!is_null($user)){
        $userRole=$user['role'];
            if($userRole==$roleRequired){
                return $next($request);
            }
            else{
                session()->flash('warning','You are not authorized');
                $intendedUrl=$request->path();
                return redirect('login?next='.$intendedUrl);
            }
    }
    else{
        session()->flash('warning','Please login to continue');
        $intendedUrl=$request->path();
        return redirect('login?next='.$intendedUrl);
    }
}
}
