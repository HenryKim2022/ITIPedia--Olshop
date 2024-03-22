<?php

namespace App\Http\Controllers\Backend\Appearance\Halal;

use App\Http\Controllers\Controller;

class HeroController extends Controller
{
    # construct
    public function __construct()
    {
        $this->middleware(['permission:homepage'])->only(['hero']);
    } 

    # homepage hero configuration
    public function hero()
    { 
        return view('backend.pages.appearance.halal.homepage.hero');
    }
}
