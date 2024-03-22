<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{


    public function  index()
    {
        return response()->json(
            [
                "order_code_prefix" => getSetting('order_code_prefix')
            ]
        );
    }

    public function contactInfo()
    {
       return [
            "location" =>       getSetting('topbar_location'),
            "contact_number" => getSetting('navbar_contact_number'),
            "email" =>          getSetting('topbar_email'),
        ];
    }
}
