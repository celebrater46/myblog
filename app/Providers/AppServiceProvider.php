<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // sqlite に限ってはデフォで外部キー制約が無効になっているので、有効に
        if (\DB::getDriverName() === "sqlite") {
            \DB::statement(\DB::raw("PRAGMA foreign_keys=1"));
        }

    }
}
