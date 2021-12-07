<?php

namespace App\Http\Controllers\Organization\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('Organization.dashboard.index');
    }
}
