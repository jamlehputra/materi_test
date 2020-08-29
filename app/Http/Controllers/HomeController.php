<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $manage = Manage::with('provinsi', 'kota')->latest()->paginate(5);
  
        return view('home',compact('manage'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
