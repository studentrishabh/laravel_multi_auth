<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //dashbord controller index method 

    public function index()
    {
       return view('dashboard');
    }
}
