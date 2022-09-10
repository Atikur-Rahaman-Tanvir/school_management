<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class test_controller extends Controller
{
    public function leave_settings(){
        return view('admin.leave_settings');
    }
}
