<?php

namespace DevRocks\Http\Controllers;

use Illuminate\Http\Request;

use DevRocks\Models\Job;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('landingpage');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function landingpage()
    {
      $countOpenJobs = Job::where('is_open', true)->count();
      $openJobs = Job::where('is_open', true)->paginate(6);

      return view('landingpage', compact('countOpenJobs', 'openJobs'));
    }
}
