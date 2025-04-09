<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            return null;
        }
        elseif ($request->has('shop')) {
            return route('landing-shop');
        }
        elseif ($request->has('home')) {
            return route('landing-page');
        }
        elseif ($request->has('about')) {
            return route('landing-about');
        } else {
            return route ('login');
        }

        return $request->expectsJson() ? null : route('login');
        return $request->expectsJson() ? null : route('landing-shop');
        return $request->expectsJson() ? null : route('landing-page');
        return $request->expectsJson() ? null : route('landing-about');
    }
}
