<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('Home.index');
    }

    public function center()
    {
        return view('Home.center');
    }

    public function style()
    {
        return view('Home.style');
    }

    public function video()
    {
        return view('Home.video');
    }
}
