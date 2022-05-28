<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function getCount(){
        $wallet = Auth::user()->wallet;
        return $count = (int) $wallet->count;
    }

    public function update(Request $request)
    {
        $wallet = Auth::user()->wallet;
        $wallet->count = $request->wallet;
        $wallet->update();
    }
}
