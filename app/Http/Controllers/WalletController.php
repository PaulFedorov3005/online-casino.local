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
        $this->middleware('auth');
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

    public function input( Request $request){
//        dd(Auth::user()->wallets()); TODO ask Anton why it dont work
        $inputNum = (int) $request->input;
        $id = Auth::user()->wallet_id;
        $walletTest = Wallet::findOrFail($id);
        $count = (int) $walletTest->count;
        $sum = $inputNum + $count;
        $walletTest->count = $sum;
        $walletTest->save();
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
