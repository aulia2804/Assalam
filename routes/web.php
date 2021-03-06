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
    return view('layouts/assalam');
})->middleware('guest');

Route::middleware('auth')->group(function(){

	Route::resources([
		'ubah_profil' => 'AdminController',
		'ubah_sandi' => 'PasswordController',
		'pengguna' => 'PenggunaController',
		'tambah_pengguna' => 'PenggunaController',
		'detail_pengguna' => 'PenggunaController',
		'ubah_pengguna' => 'PenggunaController',
		'hapus_pengguna' => 'PenggunaController',
		'pelanggan' => 'PelangganController',
		'ubah_pelanggan' => 'PelangganController',
		'hapus_pelanggan' => 'PelangganController',
		'pemasok' => 'PemasokController',
		'ubah_pemasok' => 'PemasokController',
		'hapus_pemasok' => 'PemasokController',
		'barang' => 'BarangController',
		'ubah_barang' => 'BarangController',
		'hapus_barang' => 'BarangController',
		'satuan' => 'SatuanController',
		'tambah_satuan' => 'SatuanController',
		'ubah_satuan' => 'SatuanController',
		'data_transaksi_pembelian' => 'PembelianController',
		'detail' => 'PembelianController',
		'lihat_hutang' => 'HutangController',
		'pelunasan_hutang' => 'HutangController',
		'transaksi_pembelian' => 'TranPemController',
		'tambah_barang' => 'DePemController',
		'hapus' => 'DePemController',
		'retur_pembelian' => 'TranRetController',
		'data_retur_pembelian' => 'ReturController',
		'tambah_retur' => 'DeretController',
		'hapus_retur' => 'DeretController',
		'data_transaksi_penjualan' => 'PenjualanController',
		'detail_penjualan' => 'PenjualanController',
		'lihat_piutang' => 'PiutangController',
		'pelunasan_piutang' => 'PiutangController',
		'transaksi_penjualan' => 'TranPenController',
		'tambah_penjualan' => 'DePenController',
		'hapus_detail' => 'DePenController',
		'beranda' => 'BerandaController',
		'laporan_pembelian' => 'LaporanPembelianController',
		'laporan_penjualan' => 'LaporanPenjualanController',
		'detail_retur' => 'ReturController',
		'tanggal_beli' => 'PembelianController',
		'deskripsi_retur' => 'ReturController',
	]);

	Route::get('printPembelian', 'LaporanPembelianController@unduhpembelian');
	Route::get('invoice', 'LaporanPembelianController@unduhdetail');

	Route::get('printPenjualan', 'LaporanPenjualanController@unduhpenjualan');
	Route::get('demand', 'LaporanPenjualanController@unduhdetail');

	Route::get('aktif/{id}', 'BarangController@aktif');
	Route::get('tidakaktif/{id}', 'BarangController@tidakaktif');
	Route::get('printBarang', 'BarangController@unduhbarang');
	
	Route::get('printPemasok', 'PemasokController@unduhpemasok');

	Route::get('printPelanggan', 'PelangganController@unduhpelanggan');
	
	Route::get('printBeli/{id}', 'PembelianController@unduhtransaksi');

	Route::get('printJual/{id}', 'PenjualanController@unduhjual');

	Route::get('printRetur/{id}', 'ReturController@unduhretur');

	Route::post('updateprof', 'AdminController@update_profil');
	Route::post('sandi', 'PasswordController@ubah_sandi');

	Route::get('hapus_penjualan', 'DePenController@hapuspenjualan');
	Route::get('profil/{id}', 'AdminController@update');
	Route::get('hapus_pembelian', 'DePemController@hapuspembelian');
	Route::get('hret', 'DeretController@hapusretur');

	Route::get('active/{id}', 'PenggunaController@active');
	Route::get('nonactive/{id}', 'PenggunaController@nonactive');

	Route::get('autocomplete/{id}', 'TranPemController@autocomplete');
	Route::post('tambah_pemasok', 'DePemController@tambahPemasok');
	Route::post('tambah_satu', 'DePemController@tambahSatuan');
	Route::post('dpbeli', 'DePemController@uangmuka');

	Route::get('autocomplete/{id}', 'TranRetController@autocomplete');
	Route::get('proses/{id}', 'ReturController@proses');

	Route::get('auto/{id}', 'TranPenController@autocomplete');
	Route::get('autocomplete/{id}', 'DePenController@autocomplete');
	Route::post('tambah_pelanggan', 'DePenController@tambahPelanggan');
	Route::post('dpjual', 'DePenController@uangmuka');

});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
