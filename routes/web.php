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

Route::post('/transaksi/showajax', 'TransactionController@showAjax')->name("transaksi.showAjax");
Route::get('/listobat160419144', 'MedicineController@listAllObat')->name("listObat160419144");
Route::get('/obatbatuk160419144', 'MedicineController@listObatBatuk')->name("listObatBatuk160419144");
Route::get('/daftarkategori160419144', 'CategoryController@daftarKategori')->name("daftarKategori160419144");
Route::get('/stokobatbanyak160419144', 'MedicineController@stokObatTerbanyak')->name("stokObatTerbanyak160419144");
Route::resource('/transaksi', 'TransactionController');
Route::resource('suppliers', 'SupplierController');