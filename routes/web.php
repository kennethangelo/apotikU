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


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::post('/supplier/getEditForm', 'SupplierController@getEditForm')->name('supplier.getEditForm');
    Route::post('/supplier/getEditForm2', 'SupplierController@getEditForm2')->name('supplier.getEditForm2');
    Route::post('/supplier/saveData', 'SupplierController@saveData')->name('supplier.saveData');
    Route::post('/supplier/deleteData', 'SupplierController@deleteData')->name('supplier.deleteData');
    Route::post('/supplier/saveDataField', 'SupplierController@saveDataField')->name('supplier.saveDataField');
    Route::post('/supplier/changeLogo', 'SupplierController@changeLogo')->name('supplier.changeLogo');
    Route::resource('/supplier', 'SupplierController');

    Route::get('/listobat160419144', 'ObatController@listAllObat')->name("listObat160419144");
    Route::get('/obatbatuk160419144', 'ObatController@listObatBatuk')->name("listObatBatuk160419144");
    Route::get('/stokobatbanyak160419144', 'ObatController@stokObatTerbanyak')->name("stokObatTerbanyak160419144");
    Route::post('/obat/getEditForm', 'ObatController@getEditForm')->name('obat.getEditForm');
    Route::post('/obat/getEditForm2', 'ObatController@getEditForm2')->name('obat.getEditForm2');
    Route::post('/obat/saveData', 'ObatController@saveData')->name('obat.saveData');
    Route::post('/obat/deleteData', 'ObatController@deleteData')->name('obat.deleteData');
    Route::post('/obat/saveDataField', 'ObatController@saveDataField')->name('obat.saveDataField');
    Route::post('/obat/changeImage', 'ObatController@changeImage')->name('obat.changeImage');
    Route::resource('/obat', 'ObatController');

    Route::post('/transaksi/showajax', 'TransactionController@showAjax')->name("transaksi.showAjax");
    Route::resource('/transaksi', 'TransactionController');

    Route::get('/daftarkategori160419144', 'KategoriObatController@daftarKategori')->name("daftarKategori160419144");
    Route::resource('/kategori', 'KategoriObatController');
});
