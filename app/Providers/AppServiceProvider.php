<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //


        $sharedVariable = "test from provider";
        $myclasses = ["coding school" , "lakhrin"];



        View::share([
            "sharedVariable" =>  $sharedVariable,
            "myclasses" => $myclasses
        ]);
    }
}
