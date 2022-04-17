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
    return view('home');
});

Route::get('/listobat160419144', 'ObatController@listAllObat')->name("listObat160419144");
Route::get('/obatbatuk160419144', 'ObatController@listObatBatuk')->name("listObatBatuk160419144");
Route::get('/daftarkategori160419144', 'KategoriObatController@daftarKategori')->name("daftarKategori160419144");
Route::get('/stokobatbanyak160419144', 'ObatController@stokObatTerbanyak')->name("stokObatTerbanyak160419144");
