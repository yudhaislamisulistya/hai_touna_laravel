<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', "Auth\LoginController@showLoginForm")->name('viewLoginForm');
Route::post('/login', "Auth\LoginController@login")->name('login');
Route::post('/logout', "Auth\LoginController@logout")->name('logout');

Route::group(['prefix' => 'admin', "middleware" => "auth"], function () {
    Route::get('/', "HomeController@index")->name('viewHome');
    Route::get('/kuliner', "KulinersController@index")->name('viewKuliner');
    Route::get('/wisata', "WisatasesController@index")->name('viewWisata');
    Route::get('/loker', "LokersController@index")->name('viewLoker');
    Route::get('/organisasi', "OrganisasisController@index")->name('viewOrganisasi');
    Route::get('/komunitas', "KomunitasController@index")->name('viewKomunitas');
    Route::get('/oleholeh', "OlehOlehController@index")->name('viewOlehOleh');
    Route::get('/budaya', "BudayasController@index")->name('viewBudaya');
    Route::get('/tourguide', "TourGuidesController@index")->name('viewTourGuide');
    Route::get('/event', "EventsController@index")->name('viewEvent');
    Route::get('/notifikasi', "NotifikasisController@index")->name('viewNotifikasi');
});


