<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', 'Controller@welcome')->name('welcome')->middleware('guest');
    Route::get('/login', 'Controller@welcome')->name('welcome-login')->middleware('guest');
    Route::post('/login', 'Controller@login')->name('login');
    Route::get('/logout', 'Controller@logout')->name('logout');

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::get('/home', 'Controller@home')->name('home');

        //Quotes
        Route::get('/quotes-view', 'Controller@quoteView')->name('quote-view');
        Route::get('/quotes/{id}/edit', 'Controller@quoteEdit')->name('quote-edit');
        Route::get('/quotes-create', 'Controller@quoteCreate')->name('quote-create');
        Route::post('/quotes-create', 'Controller@quoteCreateSubmit')->name('quote-create-submit');
    });
});
