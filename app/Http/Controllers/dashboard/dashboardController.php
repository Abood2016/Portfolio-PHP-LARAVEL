<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }
    public function adminlogout()
    {
        auth()->logout();
        return redirect('login')->with('success', 'You have been logged out');
    }
}
