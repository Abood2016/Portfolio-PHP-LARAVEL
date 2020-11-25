<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'Front'], function () {

Route::get('/', 'FrontController@index')->name('front.index');
    Route::get('/document/download/{file}', 'FrontController@download')->name('document.download');
    Route::get('/portfolio/show/{id}', 'FrontController@show')->name('front.portfolio.show');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
