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

// Route::get('/', function () {
//     return view('welcome');
// });


//dashboard Routes
Route::group(['prefix' => 'admin', 'namespace' => 'dashboard', 'middleware' => 'auth'], function () {

    Route::get('/', 'dashboardController@index')->name('dashboard.index');
    Route::get('/adminlogout', 'dashboardController@adminlogout')->name('admin.logout');

    Route::group(['prefix' => 'portfolio'], function () {
        
        //portfolio routes
        Route::get('/', 'PortfolioController@index')->name('portfolio.index');
        Route::get('/delete/{id}', 'PortfolioController@destroy')->name('portfolio.delete');
        Route::post('/add-new-portfolio', 'PortfolioController@store')->name('portfolio.store');
        Route::get('/show-portfolio/{id}', 'PortfolioController@show')->name('portfolio.show');
        Route::get('edit/{id}', 'PortfolioController@edit')->name('portfolio.edit');
        Route::post('/update', 'PortfolioController@update')->name('portfolio.update');
        //document routes
        Route::get('/document', 'DocumentController@create')->name('portfolio.document');
        Route::post('/document/store', 'DocumentController@store')->name('document.store');
        Route::get('/document/show', 'DocumentController@show')->name('document.show');
        Route::get('/document/view/{id}', 'DocumentController@view')->name('document.view');
        Route::get('/document/download/{file}', 'DocumentController@download')->name('document.download');
        Route::get('/document/edit/{id}', 'DocumentController@edit')->name('document.edit');
        Route::post('/document/update', 'DocumentController@update')->name('document.update');
        Route::post('/delete', 'DocumentController@deleteDocument')->name('document.delete');
    });
        //portfolio routes
        Route::group(['prefix' => 'settings'], function () {
            
        });

});


Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
