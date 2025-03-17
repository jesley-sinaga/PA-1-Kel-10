<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function managerDashboard()
    {
        return view('dashboard.manager');
    }

    public function resepsionis1Dashboard()
    {
        return view('dashboard.resepsionis1');
    }

    public function resepsionis2Dashboard()
    {
        return view('dashboard.resepsionis2');
    }
}
