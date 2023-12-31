<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VendedorMiddleware
{
    /**
     * Vendedor: Tipo de usuario "1" ->> Si es vendedor no puede acceder a la sección.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check())
        {
            $userType = Auth::user()->type;
            if($userType != 1)
            {
                return $next($request);
            }
        }
        return back()->with([
            'alert' => 'Error! Su cuenta de "VENDEDOR" no posee los permisos necesarios para realizar la operación.',
            'alertColor' => 'alert-danger',
            'alertIcon' => 'error'
        ]);
    }
}
