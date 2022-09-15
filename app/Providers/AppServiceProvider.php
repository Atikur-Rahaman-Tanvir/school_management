<?php

namespace App\Providers;

use App\Models\Admission;
use App\Models\ClassModel;
use App\Models\Department;
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
        View::share('departments', Department::latest()->orderBy('department_name', 'ASC')->get());
        View::share('admissions', Admission::latest()->get());
    }
}
