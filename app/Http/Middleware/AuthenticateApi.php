<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\AuthenticateWithBasicAuth as Middleware;

class AuthenticateApi extends Middleware
{
    protected function authenticate(Request $request)
    {
        $token = $request->bearerToken();
        if ($token === config('apitokens')[0]) return;

    }
}
