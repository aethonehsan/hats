<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Stancl\Tenancy\Facades\Tenancy;

class CheckTenantStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tenant = tenant();

        // Check if the tenant is deactivated (status = 0)
        if ($tenant && $tenant->status === 0) {
            // Redirect to an error page or return a response as needed
            return response()->view('errors.deactivated'); // Adjust this path to your actual error view
        }

        // If tenant is active, continue the request
        return $next($request);
    }
}
