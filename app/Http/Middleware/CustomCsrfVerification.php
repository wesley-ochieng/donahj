<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomCsrfVerification
{
    protected $allowedOrigins = [
        "https://api.safaricom.co.ke",
    ];

    public function handle(Request $request, Closure $next)
    {
        // Check if the request is coming from an allowed origin
        if ($this->isExternalRequest($request) && $this->isOriginAllowed($request)) {
            // Perform custom CSRF verification logic
            if ($this->verifyCsrf($request)) {
                return $next($request);
            } else {
                return response()->json(['error' => 'CSRF verification failed'], 403);
            }
        }

        return $next($request);
    }

    protected function isExternalRequest(Request $request)
    {
        // Determine if the request is coming from the external application
        // You may need to implement custom logic here based on request parameters, headers, or other factors
        return true; // Example: Always treat the request as coming from the external application
    }

    protected function isOriginAllowed(Request $request)
    {
        // Check if the origin header of the request is in the list of allowed origins and any subdomains or paths it has
        $origin = $request->header('Origin');
        foreach ($this->allowedOrigins as $allowedOrigin) {
            if (strpos($origin, $allowedOrigin) === 0) {
                return true;
            }
        }
    }

    protected function verifyCsrf(Request $request)
    {
        // Implement custom CSRF verification logic here
        // This could involve checking the origin or referer header of the request
        return true; // Example: Always return true for demonstration purposes
    }
}
