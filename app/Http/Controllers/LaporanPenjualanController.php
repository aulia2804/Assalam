<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;
use DB;

class LaporanPenjualanController extends Controller
{

    public function index()
    {
        $data = DB::table('transaksi_penjualan')
        ->select('transaksi_penjualan.id_penjualan','transaksi_penjualan.tanggal_penjualan','transaksi_penjualan.total_bayar','transaksi_penjualan.status_penjualan','transaksi_penjualan.cara_penjualan','pelanggan.id_pelanggan','pelanggan.nama_pelanggan','pengguna.id_pengguna','pengguna.nama_pengguna','detail_penjualan.id_detail_penjualan','barang.id_barang','pemasok.id_pemasok','pemasok.nama_pemasok')
        ->join('pengguna','pengguna.id_pengguna','=','transaksi_penjualan.id_pengguna')
        ->join('detail_penjualan','transaksi_penjualan.id_penjualan','=','detail_penjualan.id_penjualan')
        ->join('pelanggan','pelanggan.id_pelanggan','=','transaksi_penjualan.id_pelanggan')
        ->join('barang','barang.id_barang','=','detail_penjualan.id_barang')
        ->join('pemasok','pemasok.id_pemasok','=','barang.id_pemasok')
        ->where('status_penjualan','Publish')
        ->groupBy('transaksi_penjualan.id_penjualan')
        ->orderBy('tanggal_penjualan','ASC')
        ->get();

        $data1 = DB::table('transaksi_penjualan')
        ->select('transaksi_penjualan.id_penjualan','transaksi_penjualan.tanggal_penjualan','transaksi_penjualan.total_bayar','transaksi_penjualan.status_penjualan','transaksi_penjualan.cara_penjualan','pelanggan.id_pelanggan','pelanggan.nama_pelanggan','pengguna.id_pengguna','pengguna.nama_pengguna','detail_penjualan.id_detail_penjualan','detail_penjualan.jumlah_barang','detail_penjualan.total_harga','barang.id_barang','barang.nama_barang','barang.harga_jual','pemasok.id_pemasok','pemasok.nama_pemasok')
        ->join('pengguna','pengguna.id_pengguna','=','transaksi_penjualan.id_pengguna')
        ->join('pelanggan','pelanggan.id_pelanggan','=','transaksi_penjualan.id_pelanggan')
        ->join('detail_penjualan','transaksi_penjualan.id_penjualan','=','detail_penjualan.id_penjualan')
        ->join('barang','barang.id_barang','=','detail_penjualan.id_barang')
        ->join('pemasok','pemasok.id_pemasok','=','barang.id_pemasok')
        ->where('status_penjualan','Publish')
        ->orderBy('tanggal_penjualan')
        ->get();

        return view('laporan_penjualan',compact('data','data1'));
    }

    public function unduhpenjualan()
    {
        $data = DB::table('transaksi_penjualan')
        ->select('transaksi_penjualan.id_penjualan','transaksi_penjualan.tanggal_penjualan','transaksi_penjualan.total_bayar','transaksi_penjualan.status_penjualan','transaksi_penjualan.cara_penjualan','pengguna.id_pengguna','pengguna.nama_pengguna','detail_penjualan.id_detail_penjualan','barang.id_barang','pelanggan.id_pelanggan','pelanggan.nama_pelanggan')
        ->join('pengguna','pengguna.id_pengguna','=','transaksi_penjualan.id_pengguna')
        ->join('detail_penjualan','transaksi_penjualan.id_penjualan','=','detail_penjualan.id_penjualan')
        ->join('barang','barang.id_barang','=','detail_penjualan.id_barang')
        ->join('pelanggan','pelanggan.id_pelanggan','=','transaksi_penjualan.id_pelanggan')
        ->where('status_penjualan','Publish')
        ->groupBy('transaksi_penjualan.id_penjualan')
        ->get();

        $tanggal_cetak = Carbon::now();

        $pdf = PDF::loadView('printPenjualan', array('data'=>$data, 'tanggal_cetak'=>$tanggal_cetak));
        return $pdf->download('Laporan Penjualan.pdf'); 
    }

    public function unduhdetail()
    {
        $data1 = DB::table('transaksi_penjualan')
        ->select('transaksi_penjualan.id_penjualan','transaksi_penjualan.tanggal_penjualan','transaksi_penjualan.total_bayar','transaksi_penjualan.status_penjualan','transaksi_penjualan.cara_penjualan','pengguna.id_pengguna','pengguna.nama_pengguna','detail_penjualan.id_detail_penjualan','detail_penjualan.jumlah_barang','detail_penjualan.total_harga','barang.id_barang','barang.nama_barang','barang.harga_jual','pelanggan.id_pelanggan','pelanggan.nama_pelanggan')
        ->join('pengguna','pengguna.id_pengguna','=','transaksi_penjualan.id_pengguna')
        ->join('detail_penjualan','transaksi_penjualan.id_penjualan','=','detail_penjualan.id_penjualan')
        ->join('barang','barang.id_barang','=','detail_penjualan.id_barang')
        ->join('pelanggan','pelanggan.id_pelanggan','=','transaksi_penjualan.id_pelanggan')
        ->where('status_penjualan','Publish')
        ->orderBy('id_detail_penjualan')
        ->get();

        $tanggal_cetak = Carbon::now();

        $pdf = PDF::loadView('demand', array('data1'=>$data1, 'tanggal_cetak'=>$tanggal_cetak));
        return $pdf->download('Detail Penjualan.pdf');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
