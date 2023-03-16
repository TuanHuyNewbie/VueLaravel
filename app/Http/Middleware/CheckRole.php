<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $user = $this->guard()->user();
        if($user != NULL){
            if($user->role == 1){
                return $next($request);
            }
            else{
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        }
        else{
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function guard()
    {
        return Auth::guard();
    }
}
