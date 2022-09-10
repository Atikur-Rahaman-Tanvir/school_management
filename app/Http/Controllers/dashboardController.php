<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    //dashboard
    public function dashboard(){
        return view('dashboard.dashboard');
    }
}
