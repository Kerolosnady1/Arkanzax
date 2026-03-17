<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLicense
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Default to 'active' if not set.
        // If set to 'locked', abort with a 503 error.
        if (env('SITE_STATUS', 'active') === 'locked') {
            abort(503, 'System under scheduled maintenance. Please check back later.');
        }

        return $next($request);
    }
}
