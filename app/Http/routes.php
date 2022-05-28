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

Route::group(['middleware' => 'auth'], function(){
    Route::get('/game', 'GameController@index')->name('game.index');
    Route::get('/wallet', 'WalletController@index')->name('wallet.index');
    Route::post('/wallet/input', 'WalletController@input')->name('wallet.input');
    Route::post('/wallet/output', 'WalletController@output')->name('wallet.output');
    Route::get('/account', 'AccountController@index')->name('account.index');
    Route::put('/update', 'AccountController@update')->name('account.update');

        Route::group(['prefix' => 'api'], function() {
            Route::get('/', 'ApiController@getCount')->name('api.getCount');
            Route::post('/', 'ApiController@update')->name('api.update');
        });


});


