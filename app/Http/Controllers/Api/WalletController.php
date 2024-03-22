<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Http\Resources\Api\WalletResource;
use Illuminate\Http\Request;

class WalletController extends Controller
{
       # all wallet histories
       public function index()
       {
           $wallets = auth()->user()->wallets()->latest()->paginate(paginationNumber());
           return WalletResource::collection($wallets);
       }

}
