<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAdmin
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
        //verifier si l'utilisateur est admin
       if(!Auth::user()!=null && !Auth::user()->isAdmin())

       return redirect()->route("acceuil");
       //si l'utilisateur n'est pas admin ou root, il est redirigé vers la page 401
       //return abort(401);

        return $next($request);
    }
}
