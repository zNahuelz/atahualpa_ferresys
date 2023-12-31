<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ObservadorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check())
        {
            $userType = Auth::user()->type;
            if($userType != 2)
            {
                return $next($request);
            }
        }
        return back()->with([
            'alert' => 'Error! Su cuenta de "OBSERVADOR" no posee los permisos necesarios para realizar la operación.',
            'alertColor' => 'alert-danger',
            'alertIcon' => 'error'
        ]);
    }
}
