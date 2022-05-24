<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use App\Policies\UserPolicy;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
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
        return view('account');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);

        $user = Auth::user();
        $wallet = $user->wallet;
        $this->authorize('owner', $wallet);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        Auth::user()
            ->save();
        return redirect(route('account.index'));
    }
}
