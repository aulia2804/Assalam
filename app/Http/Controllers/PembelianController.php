<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
use PDF;
use Alert;

class PembelianController extends Controller
{
 
    public function index()
    {

        $data = DB::table('transaksi_pembelian')
            ->select('transaksi_pembelian.id_pembelian','transaksi_pembelian.tanggal_pembelian',
            'transaksi_pembelian.tanggal_jatuh_tempo','transaksi_pembelian.total_bayar','transaksi_pembelian.sisa_hutang',
            'pemasok.nama_pemasok','transaksi_pembelian.cara_pembelian')
            ->join('detail_pembelian','transaksi_pembelian.id_pembelian','=','detail_pembelian.id_pembelian')
            ->join('barang','barang.id_barang','=','detail_pembelian.id_barang')
            ->join('pemasok','pemasok.id_pemasok','=','barang.id_pemasok')
            ->groupBy('transaksi_pembelian.id_pembelian')
            ->get();
        return view('data_transaksi_pembelian')
        ->with('data', $data);
    }

    public function unduhtransaksi($id)
    {
        $data1 = DB::table('transaksi_pembelian')
            ->select('transaksi_pembelian.id_pembelian','transaksi_pembelian.tanggal_pembelian',
            'transaksi_pembelian.tanggal_jatuh_tempo','transaksi_pembelian.cara_pembelian','transaksi_pembelian.total_bayar','transaksi_pembelian.uang_muka','transaksi_pembelian.sisa_hutang','detail_pembelian.id_detail_pembelian','detail_pembelian.jumlah_barang','detail_pembelian.total_harga','barang.nama_barang','barang.id_barang','barang.harga_beli','barang.harga_jual','satuan.id_satuan','satuan.nama_satuan','pemasok.id_pemasok','pemasok.nama_pemasok','pemasok.alamat_pemasok')
            ->join('detail_pembelian','transaksi_pembelian.id_pembelian','=','detail_pembelian.id_pembelian')
            ->join('barang','barang.id_barang','=','detail_pembelian.id_barang')
            ->join('pemasok','pemasok.id_pemasok','=','barang.id_pemasok')
            ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
            ->where('transaksi_pembelian.id_pembelian',$id)
            ->groupBy('id_pembelian')
            ->get();

        $data2 = DB::table('transaksi_pembelian')
            ->select('transaksi_pembelian.id_pembelian','transaksi_pembelian.tanggal_pembelian',
            'transaksi_pembelian.tanggal_jatuh_tempo','transaksi_pembelian.cara_pembelian','transaksi_pembelian.total_bayar','transaksi_pembelian.uang_muka','transaksi_pembelian.sisa_hutang','detail_pembelian.id_detail_pembelian','detail_pembelian.jumlah_barang','detail_pembelian.total_harga','barang.nama_barang','barang.id_barang','barang.harga_beli','barang.harga_jual','satuan.id_satuan','satuan.nama_satuan','pemasok.id_pemasok','pemasok.nama_pemasok','pemasok.kontak_pemasok','pemasok.alamat_pemasok')
            ->join('detail_pembelian','transaksi_pembelian.id_pembelian','=','detail_pembelian.id_pembelian')
            ->join('barang','barang.id_barang','=','detail_pembelian.id_barang')
            ->join('pemasok','pemasok.id_pemasok','=','barang.id_pemasok')
            ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
            ->where('transaksi_pembelian.id_pembelian',$id)
            ->groupBy('id_pemasok')
            ->get();

        $data3 = DB::table('transaksi_pembelian')
            ->select('transaksi_pembelian.id_pembelian','transaksi_pembelian.tanggal_pembelian',
            'transaksi_pembelian.tanggal_jatuh_tempo','transaksi_pembelian.cara_pembelian','transaksi_pembelian.total_bayar','transaksi_pembelian.uang_muka','transaksi_pembelian.sisa_hutang','detail_pembelian.id_detail_pembelian','detail_pembelian.jumlah_barang','detail_pembelian.total_harga','barang.nama_barang','barang.id_barang','barang.harga_beli','barang.harga_jual','satuan.id_satuan','satuan.nama_satuan','pemasok.id_pemasok','pemasok.nama_pemasok','pemasok.alamat_pemasok')
            ->join('detail_pembelian','transaksi_pembelian.id_pembelian','=','detail_pembelian.id_pembelian')
            ->join('barang','barang.id_barang','=','detail_pembelian.id_barang')
            ->join('pemasok','pemasok.id_pemasok','=','barang.id_pemasok')
            ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
            ->where('transaksi_pembelian.id_pembelian',$id)
            ->orderBy('id_detail_pembelian','ASC')
            ->get();

        $data4 = DB::table('transaksi_pembelian')
            ->select('transaksi_pembelian.id_pembelian','pelunasan_hutang.id_pelunasan_hutang','pelunasan_hutang.tanggal_pelunasan_hutang','pelunasan_hutang.bayar_hutang','pelunasan_hutang.status')
            ->join('pelunasan_hutang','transaksi_pembelian.id_pembelian','=','pelunasan_hutang.id_pembelian')
            ->where('transaksi_pembelian.id_pembelian',$id)
            ->orderBy('id_pelunasan_hutang','ASC')
            ->get();

        $tanggal_cetak = Carbon::now();

        $pdf = PDF::loadView('printBeli', array('data1'=>$data1, 'data2'=>$data2, 'data3'=>$data3, 'data4'=>$data4, 'tanggal_cetak'=>$tanggal_cetak));
        return $pdf->download('Pembelian.pdf'); 
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
        $data1 = DB::table('transaksi_pembelian')
            ->select('transaksi_pembelian.id_pembelian','transaksi_pembelian.tanggal_pembelian',
            'transaksi_pembelian.tanggal_jatuh_tempo','transaksi_pembelian.cara_pembelian','transaksi_pembelian.total_bayar','transaksi_pembelian.uang_muka','transaksi_pembelian.sisa_hutang','detail_pembelian.id_detail_pembelian','detail_pembelian.jumlah_barang','detail_pembelian.total_harga','barang.nama_barang','barang.id_barang','barang.harga_beli','barang.harga_jual','satuan.id_satuan','satuan.nama_satuan','pemasok.id_pemasok','pemasok.nama_pemasok','pemasok.alamat_pemasok')
            ->join('detail_pembelian','transaksi_pembelian.id_pembelian','=','detail_pembelian.id_pembelian')
            ->join('barang','barang.id_barang','=','detail_pembelian.id_barang')
            ->join('pemasok','pemasok.id_pemasok','=','barang.id_pemasok')
            ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
            ->where('transaksi_pembelian.id_pembelian',$id)
            ->groupBy('id_pembelian')
            ->get();

        $data2 = DB::table('transaksi_pembelian')
            ->select('transaksi_pembelian.id_pembelian','transaksi_pembelian.tanggal_pembelian',
            'transaksi_pembelian.tanggal_jatuh_tempo','transaksi_pembelian.cara_pembelian','transaksi_pembelian.total_bayar','transaksi_pembelian.uang_muka','transaksi_pembelian.sisa_hutang','detail_pembelian.id_detail_pembelian','detail_pembelian.jumlah_barang','detail_pembelian.total_harga','barang.nama_barang','barang.id_barang','barang.harga_beli','barang.harga_jual','satuan.id_satuan','satuan.nama_satuan','pemasok.id_pemasok','pemasok.nama_pemasok','pemasok.kontak_pemasok','pemasok.alamat_pemasok')
            ->join('detail_pembelian','transaksi_pembelian.id_pembelian','=','detail_pembelian.id_pembelian')
            ->join('barang','barang.id_barang','=','detail_pembelian.id_barang')
            ->join('pemasok','pemasok.id_pemasok','=','barang.id_pemasok')
            ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
            ->where('transaksi_pembelian.id_pembelian',$id)
            ->groupBy('id_pemasok')
            ->get();

        $data3 = DB::table('transaksi_pembelian')
            ->select('transaksi_pembelian.id_pembelian','transaksi_pembelian.tanggal_pembelian',
            'transaksi_pembelian.tanggal_jatuh_tempo','transaksi_pembelian.cara_pembelian','transaksi_pembelian.total_bayar','transaksi_pembelian.uang_muka','transaksi_pembelian.sisa_hutang','detail_pembelian.id_detail_pembelian','detail_pembelian.jumlah_barang','detail_pembelian.total_harga','barang.nama_barang','barang.id_barang','barang.harga_beli','barang.harga_jual','satuan.id_satuan','satuan.nama_satuan','pemasok.id_pemasok','pemasok.nama_pemasok','pemasok.alamat_pemasok')
            ->join('detail_pembelian','transaksi_pembelian.id_pembelian','=','detail_pembelian.id_pembelian')
            ->join('barang','barang.id_barang','=','detail_pembelian.id_barang')
            ->join('pemasok','pemasok.id_pemasok','=','barang.id_pemasok')
            ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
            ->where('transaksi_pembelian.id_pembelian',$id)
            ->orderBy('id_detail_pembelian','ASC')
            ->get();

        $data4 = DB::table('transaksi_pembelian')
            ->select('transaksi_pembelian.id_pembelian','pelunasan_hutang.id_pelunasan_hutang','pelunasan_hutang.tanggal_pelunasan_hutang','pelunasan_hutang.bayar_hutang','pelunasan_hutang.status')
            ->join('pelunasan_hutang','transaksi_pembelian.id_pembelian','=','pelunasan_hutang.id_pembelian')
            ->where('transaksi_pembelian.id_pembelian',$id)
            ->orderBy('id_pelunasan_hutang','ASC')
            ->get();

        return view('detail_pembelian',compact('data1','data2','data3','data4'));
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
