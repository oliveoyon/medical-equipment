<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        return view('web.home');
    }

    public function aboutUs()
    {
        return view('web.about-us');
    }

    public function profile()
    {
        return view('web.company-profile');
    }
    public function certification()
    {
        return view('web.certification');
    }
    public function whyChose()
    {
        return view('web.why-choose');
    }
}
