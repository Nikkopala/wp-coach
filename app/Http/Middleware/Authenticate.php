<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        // if (! $request->expectsJson()) {
        //     return route('login');
        // }
        // MODIFICA FATTA DA IONUT PER RESTITUIRE UNA RISPOSTA PIÙ CONSONA A CHI CHIEDE JSON DA IONUT
        if ($request->ajax() || $request->wantsJson()) {
           return response('Unauthorized.', 401);
       } else {
           return route('login');
       }
        
    }
}
