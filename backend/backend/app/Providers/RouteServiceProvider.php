<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends \Illuminate\Foundation\Support\Providers\RouteServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();  // Make sure the parent boot method is called

        $this->configureRateLimiting();

        // This is where we load the API routes
        $this->routes(function () {
            Route::prefix('api')  // Add 'api' prefix for all API routes
                ->middleware('api')  // Apply the 'api' middleware
                ->group(base_path('routes/api.php'));  // Point to the api.php file
        });
    }

    /**
     * Define the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        // Here you can define rate limiters if you need
    }
}
