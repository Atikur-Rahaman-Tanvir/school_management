<?php

namespace App\Providers;

use App\Models\ClassModel;
use App\Models\TutionFees;
use Illuminate\Support\Facades\View;
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

        View::share('classes', ClassModel::all());
        View::share('tutions', TutionFees::latest()->orderBy('fees_name', 'ASC')->get());
    }
}
