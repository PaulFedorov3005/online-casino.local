<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/game', 'GameController@index')->name('game.index');
Route::get('/wallet', 'WalletController@index')->name('wallet.index');
Route::get('/account', 'AccountController@index')->name('account.index');
