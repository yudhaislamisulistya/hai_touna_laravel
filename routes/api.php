<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'kuliner'], function () {
    Route::get('/all', "KulinersController@all");
    Route::get('/limit/{limit}', "KulinersController@limit");
    Route::get('/orderby/{orderby}', "KulinersController@orderby");
    Route::get('/search/{search}', "KulinersController@search");
    Route::post('/add', "KulinersController@store")->name('addKuliner');
    Route::delete('/delete', "KulinersController@destroy")->name('destroyKuliner');
    Route::get('/get/{id_kuliner}', "KulinersController@show")->name('getKulinerById');
    Route::post('/change/{id_kuliner}', "KulinersController@edit")->name('changeKuliner');
});

Route::group(['prefix' => 'wisata'], function () {
    Route::get('/all', "WisatasesController@all");
    Route::get('/limit/{limit}', "WisatasesController@limit");
    Route::get('/orderby/{orderby}', "WisatasesController@orderby");
    Route::get('/search/{search}', "WisatasesController@search");
    Route::post('/add', "WisatasesController@store")->name('addWisata');
    Route::delete('/delete', "WisatasesController@destroy")->name('destroyWisata');
    Route::get('/get/{id_wisata}', "WisatasesController@show")->name('getWisataById');
    Route::post('/change/{id_wisata}', "WisatasesController@edit")->name('changeWisata');
});

Route::group(['prefix' => 'loker'], function () {
    Route::get('/all', "LokersController@all");
    Route::get('/limit/{limit}', "LokersController@limit");
    Route::get('/orderby/{orderby}', "LokersController@orderby");
    Route::get('/search/{search}', "LokersController@search");
    Route::post('/add', "LokersController@store")->name('addLoker');
    Route::delete('/delete', "LokersController@destroy")->name('destroyLoker');
    Route::get('/get/{id_loker}', "LokersController@show")->name('getLokerById');
    Route::post('/change/{id_loker}', "LokersController@edit")->name('changeLoker');
});

Route::group(['prefix' => 'organisasi'], function () {
    Route::get('/all', "OrganisasisController@all");
    Route::get('/limit/{limit}', "OrganisasisController@limit");
    Route::get('/orderby/{orderby}', "OrganisasisController@orderby");
    Route::get('/search/{search}', "OrganisasisController@search");
    Route::post('/add', "OrganisasisController@store")->name('addOrganisasi');
    Route::delete('/delete', "OrganisasisController@destroy")->name('destroyOrganisasi');
    Route::get('/get/{id_organisasi}', "OrganisasisController@show")->name('getOrganisasiById');
    Route::post('/change/{id_organisasi}', "OrganisasisController@edit")->name('changeOrganisasi');
});

Route::group(['prefix' => 'komunitas'], function () {
    Route::get('/all', "KomunitasController@all");
    Route::get('/limit/{limit}', "KomunitasController@limit");
    Route::get('/orderby/{orderby}', "KomunitasController@orderby");
    Route::get('/search/{search}', "KomunitasController@search");
    Route::post('/add', "KomunitasController@store")->name('addKomunitas');
    Route::delete('/delete', "KomunitasController@destroy")->name('destroyKomunitas');
    Route::get('/get/{id_komunitas}', "KomunitasController@show")->name('getKomunitasById');
    Route::post('/change/{id_komunitas}', "KomunitasController@edit")->name('changeKomunitas');
});

Route::group(['prefix' => 'oleholeh'], function () {
    Route::get('/all', "OlehOlehController@all");
    Route::get('/limit/{limit}', "OlehOlehController@limit");
    Route::get('/orderby/{orderby}', "OlehOlehController@orderby");
    Route::get('/search/{search}', "OlehOlehController@search");
    Route::post('/add', "OlehOlehController@store")->name('addOlehOleh');
    Route::delete('/delete', "OlehOlehController@destroy")->name('destroyOlehOleh');
    Route::get('/get/{id_oleholeh}', "OlehOlehController@show")->name('getOlehOlehById');
    Route::post('/change/{id_oleholeh}', "OlehOlehController@edit")->name('changeOlehOleh');
});

Route::group(['prefix' => 'budaya'], function () {
    Route::get('/all', "BudayasController@all");
    Route::get('/limit/{limit}', "BudayasController@limit");
    Route::get('/jenis/{jenis}', "BudayasController@getByJenis");
    Route::get('/orderby/{orderby}', "BudayasController@orderby");
    Route::get('/search/{search}', "BudayasController@search");
    Route::get('/jenis/{jenis}/limit/{limit}', "BudayasController@limitByJenis");
    Route::post('/add', "BudayasController@store")->name('addBudaya');
    Route::delete('/delete', "BudayasController@destroy")->name('destroyBudaya');
    Route::get('/get/{id_budaya}', "BudayasController@show")->name('getBudayaById');
    Route::post('/change/{id_budaya}', "BudayasController@edit")->name('changeBudaya');
});

Route::group(['prefix' => 'tourguide'], function () {
    Route::get('/all', "TourGuidesController@all");
    Route::get('/limit/{limit}', "TourGuidesController@limit");
    Route::get('/orderby/{orderby}', "TourGuidesController@orderby");
    Route::get('/search/{search}', "TourGuidesController@search");
    Route::post('/add', "TourGuidesController@store")->name('addTourGuide');
    Route::delete('/delete', "TourGuidesController@destroy")->name('destroyTourGuide');
    Route::get('/get/{id_tourguide}', "TourGuidesController@show")->name('getTourGuideById');
    Route::post('/change/{id_tourguide}', "TourGuidesController@edit")->name('changeTourGuide');
});

Route::group(['prefix' => 'event'], function () {
    Route::get('/all', "EventsController@all");
    Route::get('/limit/{limit}', "EventsController@limit");
    Route::get('/orderby/{orderby}', "EventsController@orderby");
    Route::get('/search/{search}', "EventsController@search");
    Route::post('/add', "EventsController@store")->name('addEvent');
    Route::delete('/delete', "EventsController@destroy")->name('destroyEvent');
    Route::get('/get/{id_event}', "EventsController@show")->name('getEventById');
    Route::post('/change/{id_event}', "EventsController@edit")->name('changeEvent');
});

Route::group(['prefix' => 'notifikasi'], function () {
    Route::get('/all', "NotifikasisController@all");
    Route::get('/limit/{limit}', "NotifikasisController@limit");
    Route::get('/orderby/{orderby}', "NotifikasisController@orderby");
    Route::get('/search/{search}', "NotifikasisController@search");
    Route::post('/add', "NotifikasisController@store")->name('addNotifikasi');
    Route::delete('/delete', "NotifikasisController@destroy")->name('destroyNotifikasi');
    Route::get('/get/{id_notifikasi}', "NotifikasisController@show")->name('getNotifikasiById');
    Route::post('/change/{id_notifikasi}', "NotifikasisController@edit")->name('changeNotifikasi');
});

