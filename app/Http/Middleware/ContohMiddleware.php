<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ContohMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $apiKey = $request->header('X-API-PRGANYRN');
        if($apiKey == 'Balqis_FA')
        {
            return $next($request);
        }else{
            return response('Akses Dilarang', 401);
        }
    }
}
