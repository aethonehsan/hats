<?php


use App\Http\Controllers\SiteController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SiteAdminController;
use App\Http\Controllers\TenantDashboardController;
use Illuminate\Support\Facades\Route;
use App\Models\Site;
use App\Models\SuperAdmin;


// routes/web.php, api.php or any other central route files you have
foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {
        // Public routes
        Route::get('/', [FrontendController::class, 'showwelcome']);

        // Authenticated routes
        Route::middleware('auth')->group(function () {
            Route::get('/dashboard', function () {
                $totaltenants=Site::count();
                $totalsuperadmins=SuperAdmin::count();
                return view('dashboard', compact('totaltenants', 'totalsuperadmins'));
            })->name('dashboard');

            // Protected resource routes
            Route::resource('sites', SiteController::class);
            Route::resource('superadmins', SuperAdminController::class);
            Route::resource('siteadmins', SiteAdminController::class);

            //Tenant Dashboard

            Route::get('/tenantsdashbaord', [TenantDashboardController::class, 'index']);

        });

        require __DIR__.'/auth.php';
    });
}

