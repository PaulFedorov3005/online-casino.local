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

    public function input(Wallet $wallet, Request $request){
        $inputNum = (int) $request->input;
        $id = Auth::user()->wallet_id;
        $walletTest = Wallet::findOrFail($id);
        $count = (int) $walletTest->count;
        $sum = $inputNum + $count;
        $walletTest->count = $sum;
        $walletTest->save();
//        $wallet->update();
//        Wallet::findOrFail($id)->count = $sum;
//        Wallet::updated();
//        Auth::user()->wallets()->update();

        return redirect(route('wallet.index'));
    }

    public function output(Request $request){
        $errors = [];
        $outputNum = (int) $request->output;
        $id = Auth::user()->wallet_id;
        $walletTest = Wallet::findOrFail($id);
        $count = (int) $walletTest->count;
        if ($count>$outputNum){
            $res = $count - $outputNum ;
            $walletTest->count = $res;
            $walletTest->save();
        }else{
            $errors [] = 'not enough money for output';
        }

        return redirect(route('wallet.index'))->withErrors($errors);
    }
}
