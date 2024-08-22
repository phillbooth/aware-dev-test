<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected function tokensMatch($request)
    {
        $token = $request->input('_token') ?: $request->header('X-CSRF-TOKEN');
        $sessionToken = $request->session()->token();

        error_log('Request CSRF token: ' . $token);
        error_log('Session CSRF token: ' . $sessionToken);

        return is_string($sessionToken) && hash_equals($sessionToken, $token);
    }
}
