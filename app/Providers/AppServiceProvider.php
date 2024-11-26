<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\CKEditorHelper;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('ckeditorhelper', function() {
            return \App\Helpers\CKEditorHelper::getInstance();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
