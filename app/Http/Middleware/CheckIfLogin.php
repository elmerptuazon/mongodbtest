<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfLogin
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

        if(!isset($_COOKIE['stp'])) {
            return $next($request);
        } else {


            $headers = array
            (
                'Authorization: Bearer '.base64_decode($_COOKIE['stp'])
            );
    
            $ch = curl_init();
            curl_setopt( $ch,CURLOPT_URL, 'http://127.0.0.1:8001/api/auth/compare/token/api' );
            curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
            curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
            $result = curl_exec($ch );
            curl_close( $ch );
            if($result == 'success') {
                return redirect('/dashboard');
            } else {
                return $next($request);
            }
        }

    }
}
