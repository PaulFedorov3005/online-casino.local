<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->wallet_id;
        $wallet = Wallet::findOrFail($id);
        $count = $wallet->count;
        $countNum = $wallet->id;
        return view('wallet', ['count'=>$count, 'countNum'=>$countNum]);
    }

    public function input(Request $request){
        $inputNum = (int) $request->input;
        $wallet = Auth::user()->wallets;
        $count = (int) $wallet->count;
        $sum = $inputNum + $count;
        $wallet->count = $sum;
        $wallet->save();
        return redirect(route('wallet.index'));
    }

    public function output(Request $request){
        $errors = [];
        $outputNum = (int) $request->output;
        $wallet = Auth::user()->wallets;

        $count = (int) $wallet->count;
        if ($count>=$outputNum){
            $res = $count - $outputNum ;
            $wallet->count = $res;
            $wallet->save();
        }else{
            $errors [] = 'not enough money for output';
        }

        return redirect(route('wallet.index'))->withErrors($errors);
    }
}
