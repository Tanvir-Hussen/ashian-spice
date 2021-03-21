<?php

namespace App\Http\Controllers\about;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function about_us()
    {
        return view('user.about.about_us');
    }
}
