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
    return view('login');
});
Route::post('login', 'LoginController@login');
Route::get('logout', 'LoginController@logout');

Route::get('/beranda', function () {
    return view('beranda');
});

Route::resource('pengguna', 'PenggunaController');
Route::resource('tambah_pengguna', 'PenggunaController');
Route::resource('detail_pengguna', 'PenggunaController');
Route::resource('ubah_pengguna', 'PenggunaController');
Route::get('active/{id}', 'PenggunaController@active');
Route::get('nonactive/{id}', 'PenggunaController@nonactive');

Route::resource('pelanggan', 'PelangganController');
Route::resource('ubah_pelanggan', 'PelangganController');

Route::resource('pemasok', 'PemasokController');
Route::resource('ubah_pemasok', 'PemasokController');

Route::resource('barang', 'BarangController');
Route::resource('ubah_barang', 'BarangController');

Route::resource('satuan', 'SatuanController');
Route::resource('tambah_satuan', 'SatuanController');
Route::resource('ubah_satuan', 'SatuanController');

Route::resource('data_transaksi_pembelian', 'PembelianController');
Route::resource('data_retur_pembelian', 'ReturController');
Route::resource('pelunasan_hutang', 'HutangController');
Route::resource('transaksi_pembelian', 'TranPemController');
Route::resource('tambah_barang', 'DePemController');
Route::get('autocomplete/{id}', 'TranPemController@autocomplete');
Route::post('tambah_pemasok', 'DePemController@tambahPemasok');

Route::resource('data_transaksi_penjualan', 'PenjualanController');
Route::resource('transaksi_penjualan', 'TranPenController');
Route::get('autocomplete/{id}', 'TranPenController@autocomplete');
Route::resource('tambah_penjualan', 'DePenController');
Route::get('autocomplete/{id}', 'DePenController@autocomplete');
Route::post('tambah_pelanggan', 'DePenController@tambahPelanggan');

Route::get('/table', function () {
    return view('table');
});

Route::get('/retur_pembelian', function () {
    return view('retur_pembelian');
});

Route::get('/data_retur_pembelian', function () {
    return view('data_retur_pembelian');
});
