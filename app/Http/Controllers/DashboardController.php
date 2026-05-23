<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function adminIndex()
    {
        return view('admin.pages.dashboard');
    }

    public function userIndex()
    {
        return view('user.pages.dashboard');
    }
}
