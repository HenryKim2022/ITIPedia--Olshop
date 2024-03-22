<?php

namespace App\Http\Controllers\Backend\Affiliate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AffiliateConfigurationsController extends Controller
{ 
    # affiliate configurations
    public function index()
    {
        return view('backend.pages.affiliate.configurations');
    }
}
