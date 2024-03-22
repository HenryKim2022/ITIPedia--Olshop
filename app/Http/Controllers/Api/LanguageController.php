<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\LanguageResource;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    //
    public function index()
    {
       $languages= Language::where('is_active', 1)->get();

       //return response()->json($languages);
       return LanguageResource::collection($languages);
    }
}
