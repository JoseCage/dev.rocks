<?php

namespace DevRocks\Http\Controllers\Company;

use Illuminate\Http\Request;
use DevRocks\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function home()
    {
        return view('admin.home');
    }
}
