<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\BaseLocationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PDFController;
//assign roles & perm
use App\Http\Controllers\AssignRoleController;
use App\Http\Controllers\AssignPermissionController;
use App\Http\Controllers\NotificationController;
use Stancl\Tenancy\Tenant;


/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([

    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
    'check.tenant.status',

])->group(function () {
    // Start tenant routes

    Route::get('/', function () {
        $tenant = tenant(); // Fetch the current tenant
        return view('app.welcome', compact('tenant'));
    });

    // Resource routes for users, roles, permissions
    Route::middleware('auth')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('app.dashboard');

        Route::group(['middleware' => ['role:Admin']], function () {

            Route::resource('/users', UserController::class);
            Route::resource('/roles', RoleController::class);
            Route::resource('/permissions', PermissionController::class);

            // Assign roles and permissions
            Route::post('assignrole/{uid}', [AssignRoleController::class, 'assignrole'])->name('assignrole');
            Route::post('assignpermission/{rid}', [AssignPermissionController::class, 'assignpermission'])->name('assignpermission');

            // For bids and runs, runcategories
            Route::resource('/jobs', JobController::class);
            Route::resource('/departments', DepartmentController::class);

            // For drivers
            Route::resource('/drivers', DriverController::class);

            //For Base Location
            Route::resource('/baselocations', BaseLocationController::class);

        });

        // For bids and runs, runcategories
        Route::resource('/bids', BidController::class);

 //Notifications
 Route::resource('notifications', NotificationController::class);

 //Invoices
 Route::resource('invoices', InvoiceController::class);

        // PDF
        Route::get('/generate-pdf', [PDFController::class, 'generatePDF']);
    });

    // Include tenantapp routes
    require __DIR__.'/tenantauth.php';

    // End tenant routes
});

