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

Route::get('hapus_penjualan', 'DePenController@hapuspenjualan');
Route::get('hapus_pembelian', 'DePemController@hapuspembelian');
Route::get('hret', 'DeretController@hapusretur');

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
Route::resource('pelunasan_hutang', 'HutangController');
Route::resource('transaksi_pembelian', 'TranPemController');
Route::resource('tambah_barang', 'DePemController');
Route::resource('hapus', 'DePemController');
Route::get('autocomplete/{id}', 'TranPemController@autocomplete');
Route::post('tambah_pemasok', 'DePemController@tambahPemasok');
Route::post('dpbeli', 'DePemController@uangmuka');

Route::resource('retur_pembelian', 'TranRetController');
Route::get('autocomplete/{id}', 'TranRetController@autocomplete');
Route::resource('data_retur_pembelian', 'ReturController');
Route::resource('tambah_retur', 'DeretController');
Route::resource('hapus_retur', 'DeretController');

Route::resource('data_transaksi_penjualan', 'PenjualanController');
Route::resource('transaksi_penjualan', 'TranPenController');
Route::get('autocomplete/{id}', 'TranPenController@autocomplete');
Route::resource('tambah_penjualan', 'DePenController');
Route::resource('hapus_detail', 'DePenController');
Route::get('autocomplete/{id}', 'DePenController@autocomplete');
Route::post('tambah_pelanggan', 'DePenController@tambahPelanggan');
Route::post('dpjual', 'DePenController@uangmuka');

Route::get('/table', function () {
    return view('table');
});


