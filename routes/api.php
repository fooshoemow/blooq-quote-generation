<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth', 'namespace' => 'App\Http\Controllers'], function () {
    Route::post('/quotes-create', 'ApiController@quoteCreateSubmit')->name('quote-create-submit');
    Route::post('/quotes-update', 'ApiController@quoteUpdate')->name('quote-update');
    Route::delete('/quotes-delete', 'ApiController@quoteDelete')->name('quote-delete');
    Route::post('/quotes-add-line-item', 'ApiController@quoteAddLineItem')->name('quote-add-line-item');
});
