<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Corrected the view path
        return view('dashboard.dashboard', ['user' => Auth::user()]);
    }
}
