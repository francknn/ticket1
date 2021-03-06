<?php

namespace App\Http\Middleware;

use Closure;

class CORS
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

header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

        header('Access-Control-Allow-Origin : *');
        header('Access-Control-Allow-Headers : Content-type, X-Auth-Token, Authorization, Origin', 'GET, POST, PUT, DELETE, OPTIONS');
        return $next($request);
    }
    
}
