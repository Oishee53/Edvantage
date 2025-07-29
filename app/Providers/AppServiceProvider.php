<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Services\MuxService;

class AppServiceProvider extends ServiceProvider
{
    public function register()
{
    $this->app->bind(MuxService::class, function ($app) {
        return new MuxService();
    });
}
    public function boot(): void
    {
        Route::middleware('web')
            ->group(base_path('routes/admin.php'));
    }
}