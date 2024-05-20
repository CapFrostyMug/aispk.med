<?php

namespace App\Providers;

use App\Services\ReportGeneratorService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Maatwebsite\Excel\Concerns\FromCollection;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FromCollection::class, ReportGeneratorService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
