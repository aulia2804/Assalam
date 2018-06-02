<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use PDF;

class LaporanPembelianController extends Controller
{

    public function index()
    {
        $data = DB::table('transaksi_pembelian')
        ->select('transaksi_pembelian.id_pembelian','transaksi_pembelian.tanggal_pembelian','transaksi_pembelian.tanggal_jatuh_tempo','transaksi_pembelian.total_bayar','transaksi_pembelian.status_pembelian','transaksi_pembelian.cara_pembelian','pengguna.id_pengguna','pengguna.nama_pengguna','detail_pembelian.id_detail_pembelian','barang.id_barang','pemasok.id_pemasok','pemasok.nama_pemasok')
        ->join('pengguna','pengguna.id_pengguna','=','transaksi_pembelian.id_pengguna')
        ->join('detail_pembelian','transaksi_pembelian.id_pembelian','=','detail_pembelian.id_pembelian')
        ->join('barang','barang.id_barang','=','detail_pembelian.id_barang')
        ->join('pemasok','pemasok.id_pemasok','=','barang.id_pemasok')
        ->where('status_pembelian','Publish')
        ->groupBy('transaksi_pembelian.id_pembelian')
        ->get();

        $data1 = DB::table('transaksi_pembelian')
        ->select('transaksi_pembelian.id_pembelian','transaksi_pembelian.tanggal_pembelian','transaksi_pembelian.tanggal_jatuh_tempo','transaksi_pembelian.total_bayar','transaksi_pembelian.status_pembelian','transaksi_pembelian.cara_pembelian','pengguna.id_pengguna','pengguna.nama_pengguna','detail_pembelian.id_detail_pembelian','detail_pembelian.jumlah_barang','detail_pembelian.total_harga','barang.id_barang','barang.nama_barang','barang.harga_beli','pemasok.id_pemasok','pemasok.nama_pemasok')
        ->join('pengguna','pengguna.id_pengguna','=','transaksi_pembelian.id_pengguna')
        ->join('detail_pembelian','transaksi_pembelian.id_pembelian','=','detail_pembelian.id_pembelian')
        ->join('barang','barang.id_barang','=','detail_pembelian.id_barang')
        ->join('pemasok','pemasok.id_pemasok','=','barang.id_pemasok')
        ->where('status_pembelian','Publish')
        ->orderBy('id_detail_pembelian')
        ->get();
        return view('laporan_pembelian',compact('data','data1'));
    }

    public function unduhpembelian()
    {
        $data = DB::table('transaksi_pembelian')
        ->select('transaksi_pembelian.id_pembelian','transaksi_pembelian.tanggal_pembelian','transaksi_pembelian.tanggal_jatuh_tempo','transaksi_pembelian.total_bayar','transaksi_pembelian.status_pembelian','transaksi_pembelian.cara_pembelian','pengguna.id_pengguna','pengguna.nama_pengguna','detail_pembelian.id_detail_pembelian','barang.id_barang','pemasok.id_pemasok','pemasok.nama_pemasok')
        ->join('pengguna','pengguna.id_pengguna','=','transaksi_pembelian.id_pengguna')
        ->join('detail_pembelian','transaksi_pembelian.id_pembelian','=','detail_pembelian.id_pembelian')
        ->join('barang','barang.id_barang','=','detail_pembelian.id_barang')
        ->join('pemasok','pemasok.id_pemasok','=','barang.id_pemasok')
        ->where('status_pembelian','Publish')
        ->groupBy('transaksi_pembelian.id_pembelian')
        ->get();

        $pdf = PDF::loadView('printPembelian', array('data'=>$data));
        return $pdf->download('Laporan Pembelian.pdf'); 

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
