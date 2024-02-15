<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateCustom
{

// checking to see if the authorization is emmagbin in the header
public function handle($request, Closure $next)
{
    // Check if Authorization header exists and its value is "emmagbin"
    if ($request->header('Authorization') === 'emmagbin') {
        // Authorization header value is "emmagbin"
        // You can perform additional validation or actions here
        return $next($request);
    }

    // Authorization header value is not "emmagbin", return error response
    return response()->json(['error' => 'Unauthorized'], 401);
}



}


