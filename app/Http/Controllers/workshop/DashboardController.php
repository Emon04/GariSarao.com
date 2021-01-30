<?php

namespace App\Http\Controllers\workshop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home(){
        return view('autoMobileWorkshop.home.home');
    }
}
