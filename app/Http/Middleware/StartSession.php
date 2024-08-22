<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\Middleware\StartSession as BaseStartSession;

class StartSession extends BaseStartSession
{
    public function handle($request, Closure $next)
    {
        // Initialize session
        $response = parent::handle($request, $next);

        // Ensure session is active
        if (!$request->session()->isStarted()) {
            $request->session()->start();
        }

        return $response;
    }
}
