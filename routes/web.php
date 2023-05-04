<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/search', 'HomeController@index')->name('home.search');


Route::get('pegawai/search', 'PegawaiController@index')->name('pegawai.search');
Route::resource('pegawai', 'PegawaiController');
Route::get('pengajuan-claim/search', 'PengajuanClaimController@index')->name('pengajuan-claim.search');
Route::resource('pengajuan-claim', 'PengajuanClaimController');
