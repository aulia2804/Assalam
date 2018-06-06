<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;
use DB;

class PenjualanController extends Controller
{

    public function index()
    {
        $data = DB::table('transaksi_penjualan')
                    ->select('transaksi_penjualan.id_penjualan','transaksi_penjualan.tanggal_penjualan','transaksi_penjualan.total_bayar','transaksi_penjualan.uang_muka','pelanggan.nama_pelanggan','transaksi_penjualan.sisa_piutang')
                    ->join('pelanggan','pelanggan.id_pelanggan','=','transaksi_penjualan.id_pelanggan')
                    ->orderBy('id_penjualan', 'ASC')
                    ->get();
        return view('data_transaksi_penjualan')
        ->with('data', $data);
    }

    public function unduhjual($id)
    {
        $data1 = DB::table('transaksi_penjualan')
            ->select('transaksi_penjualan.id_penjualan','transaksi_penjualan.tanggal_penjualan','transaksi_penjualan.cara_penjualan','transaksi_penjualan.total_bayar','transaksi_penjualan.uang_muka','transaksi_penjualan.sisa_piutang','detail_penjualan.id_detail_penjualan','detail_penjualan.jumlah_barang','detail_penjualan.total_harga','barang.nama_barang','barang.id_barang','barang.harga_beli','barang.harga_jual','satuan.id_satuan','satuan.nama_satuan','pelanggan.id_pelanggan','pelanggan.nama_pelanggan','pelanggan.alamat_pelanggan')
            ->join('detail_penjualan','transaksi_penjualan.id_penjualan','=','detail_penjualan.id_penjualan')
            ->join('pelanggan','pelanggan.id_pelanggan','=','transaksi_penjualan.id_pelanggan')
            ->join('barang','barang.id_barang','=','detail_penjualan.id_barang')
            ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
            ->where('transaksi_penjualan.id_penjualan',$id)
            ->groupBy('id_penjualan')
            ->get();

        $data2 = DB::table('transaksi_penjualan')
            ->select('transaksi_penjualan.id_penjualan','transaksi_penjualan.tanggal_penjualan','transaksi_penjualan.cara_penjualan','transaksi_penjualan.total_bayar','transaksi_penjualan.uang_muka','detail_penjualan.id_detail_penjualan','detail_penjualan.jumlah_barang','detail_penjualan.total_harga','barang.nama_barang','barang.id_barang','barang.harga_beli','barang.harga_jual','satuan.id_satuan','satuan.nama_satuan','pelanggan.id_pelanggan','pelanggan.nama_pelanggan','pelanggan.alamat_pelanggan','pelanggan.kontak_pelanggan')
            ->join('detail_penjualan','transaksi_penjualan.id_penjualan','=','detail_penjualan.id_penjualan')
            ->join('pelanggan','pelanggan.id_pelanggan','=','transaksi_penjualan.id_pelanggan')
            ->join('barang','barang.id_barang','=','detail_penjualan.id_barang')
            ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
            ->where('transaksi_penjualan.id_penjualan',$id)
            ->groupBy('id_pelanggan')
            ->get();

        $data3 = DB::table('transaksi_penjualan')
            ->select('transaksi_penjualan.id_penjualan','transaksi_penjualan.tanggal_penjualan','transaksi_penjualan.cara_penjualan','transaksi_penjualan.total_bayar','transaksi_penjualan.uang_muka','detail_penjualan.id_detail_penjualan','detail_penjualan.jumlah_barang','detail_penjualan.total_harga','barang.nama_barang','barang.id_barang','barang.harga_beli','barang.harga_jual','satuan.id_satuan','satuan.nama_satuan','pelanggan.id_pelanggan','pelanggan.nama_pelanggan','pelanggan.alamat_pelanggan','pelanggan.kontak_pelanggan')
            ->join('detail_penjualan','transaksi_penjualan.id_penjualan','=','detail_penjualan.id_penjualan')
            ->join('pelanggan','pelanggan.id_pelanggan','=','transaksi_penjualan.id_pelanggan')
            ->join('barang','barang.id_barang','=','detail_penjualan.id_barang')
            ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
            ->where('transaksi_penjualan.id_penjualan',$id)
            ->orderBy('id_detail_penjualan','ASC')
            ->get();

        $data4 = DB::table('transaksi_penjualan')
        ->select('transaksi_penjualan.id_penjualan','pelunasan_piutang.id_pelunasan_piutang','pelunasan_piutang.tanggal_pelunasan_piutang','pelunasan_piutang.bayar_piutang','pelunasan_piutang.status')
        ->join('pelunasan_piutang','transaksi_penjualan.id_penjualan','=','pelunasan_piutang.id_penjualan')
        ->where('transaksi_penjualan.id_penjualan',$id)
        ->orderBy('id_pelunasan_piutang','ASC')
        ->get();

        $tanggal_cetak = Carbon::now();

        $pdf = PDF::loadView('printJual', array('data1'=>$data1, 'data2'=>$data2, 'data3'=>$data3, 'data4'=>$data4, 'tanggal_cetak'=>$tanggal_cetak));
        return $pdf->download('Penjualan.pdf'); 
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
        $data1 = DB::table('transaksi_penjualan')
            ->select('transaksi_penjualan.id_penjualan','transaksi_penjualan.tanggal_penjualan','transaksi_penjualan.cara_penjualan','transaksi_penjualan.total_bayar','transaksi_penjualan.uang_muka','detail_penjualan.id_detail_penjualan','detail_penjualan.jumlah_barang','detail_penjualan.total_harga','barang.nama_barang','barang.id_barang','barang.harga_beli','barang.harga_jual','satuan.id_satuan','satuan.nama_satuan','pelanggan.id_pelanggan','pelanggan.nama_pelanggan','pelanggan.alamat_pelanggan')
            ->join('detail_penjualan','transaksi_penjualan.id_penjualan','=','detail_penjualan.id_penjualan')
            ->join('pelanggan','pelanggan.id_pelanggan','=','transaksi_penjualan.id_pelanggan')
            ->join('barang','barang.id_barang','=','detail_penjualan.id_barang')
            ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
            ->where('transaksi_penjualan.id_penjualan',$id)
            ->groupBy('id_penjualan')
            ->get();

        $data2 = DB::table('transaksi_penjualan')
            ->select('transaksi_penjualan.id_penjualan','transaksi_penjualan.tanggal_penjualan','transaksi_penjualan.cara_penjualan','transaksi_penjualan.total_bayar','transaksi_penjualan.uang_muka','detail_penjualan.id_detail_penjualan','detail_penjualan.jumlah_barang','detail_penjualan.total_harga','barang.nama_barang','barang.id_barang','barang.harga_beli','barang.harga_jual','satuan.id_satuan','satuan.nama_satuan','pelanggan.id_pelanggan','pelanggan.nama_pelanggan','pelanggan.alamat_pelanggan','pelanggan.kontak_pelanggan')
            ->join('detail_penjualan','transaksi_penjualan.id_penjualan','=','detail_penjualan.id_penjualan')
            ->join('pelanggan','pelanggan.id_pelanggan','=','transaksi_penjualan.id_pelanggan')
            ->join('barang','barang.id_barang','=','detail_penjualan.id_barang')
            ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
            ->where('transaksi_penjualan.id_penjualan',$id)
            ->groupBy('id_pelanggan')
            ->get();

        $data3 = DB::table('transaksi_penjualan')
            ->select('transaksi_penjualan.id_penjualan','transaksi_penjualan.tanggal_penjualan','transaksi_penjualan.cara_penjualan','transaksi_penjualan.total_bayar','transaksi_penjualan.uang_muka','detail_penjualan.id_detail_penjualan','detail_penjualan.jumlah_barang','detail_penjualan.total_harga','barang.nama_barang','barang.id_barang','barang.harga_beli','barang.harga_jual','satuan.id_satuan','satuan.nama_satuan','pelanggan.id_pelanggan','pelanggan.nama_pelanggan','pelanggan.alamat_pelanggan','pelanggan.kontak_pelanggan')
            ->join('detail_penjualan','transaksi_penjualan.id_penjualan','=','detail_penjualan.id_penjualan')
            ->join('pelanggan','pelanggan.id_pelanggan','=','transaksi_penjualan.id_pelanggan')
            ->join('barang','barang.id_barang','=','detail_penjualan.id_barang')
            ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
            ->where('transaksi_penjualan.id_penjualan',$id)
            ->orderBy('id_detail_penjualan','ASC')
            ->get();
        return view('detail_penjualan',compact('data1','data2','data3'));
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
