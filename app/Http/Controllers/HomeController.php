<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }
    public function index()
    {
        if(request()->user()->role == 1 || request()->user()->role == 4)
        {
            return view('home.dashboard');
        }elseif(request()->user()->role == 2)
        {

        }else
        {
            return view('siswa.dashboard.dashboard');
        }
    }
}
