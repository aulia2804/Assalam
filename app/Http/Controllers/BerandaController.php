<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class BerandaController extends Controller
{

    public function index()
    {
        $penjualan = DB::table('transaksi_penjualan')
        ->select(DB::raw('COUNT(id_penjualan) as penjualan'))
        ->where('status_penjualan', 'Publish')
        ->orderBy('id_penjualan')
        ->get();

        $pembelian = DB::table('transaksi_pembelian')
        ->select(DB::raw('COUNT(id_pembelian) as pembelian'))
        ->where('status_pembelian', 'Publish')
        ->orderBy('id_pembelian')
        ->get();

        $jual = DB::table('transaksi_penjualan')
            ->select(DB::raw('sum(total_bayar) as total'))
            ->where('status_penjualan', 'Publish')
            ->first();

        $beli = DB::table('transaksi_pembelian')
            ->select(DB::raw('sum(total_bayar) as total'))
            ->where('status_pembelian', 'Publish')
            ->first();

        $barang = DB::table('barang')
        ->select('id_barang')
        ->where('status_barang', 'Publish')
        ->count();

        $hasil=$jual->total-$beli->total;

        $stok = DB::table('barang')
        ->select('barang.id_barang','barang.nama_barang','barang.stok')
        ->where('stok','<',50)
        ->where('status_barang','Publish')
        ->orderBy('id_barang', 'ASC')
        ->get();

        $tanggal = DB::table('transaksi_pembelian')
        ->select('transaksi_pembelian.id_pembelian','transaksi_pembelian.tanggal_jatuh_tempo','detail_pembelian.id_detail_pembelian','barang.id_barang','pemasok.id_pemasok','pemasok.nama_pemasok','transaksi_pembelian.sisa_hutang')
        ->join('detail_pembelian','transaksi_pembelian.id_pembelian','=','detail_pembelian.id_pembelian')
        ->join('barang','barang.id_barang','=','detail_pembelian.id_barang')
        ->join('pemasok','pemasok.id_pemasok','=','barang.id_pemasok')
        ->where('sisa_hutang','>',0)
        ->orderBy('id_pembelian')
        ->get();

        $bulan1 = DB::table('transaksi_pembelian')
        ->select('id_pembelian')
        ->whereMonth('tanggal_pembelian', '=', 1)
        ->count();

        $bulan2 = DB::table('transaksi_pembelian')
        ->select('id_pembelian')
        ->whereMonth('tanggal_pembelian', '=', 2)
        ->count();

        $bulan3 = DB::table('transaksi_pembelian')
        ->select('id_pembelian')
        ->whereMonth('tanggal_pembelian', '=', 3)
        ->count();

        $bulan4 = DB::table('transaksi_pembelian')
        ->select('id_pembelian')
        ->whereMonth('tanggal_pembelian', '=', 4)
        ->count();

        $bulan5 = DB::table('transaksi_pembelian')
        ->select('id_pembelian')
        ->whereMonth('tanggal_pembelian', '=', 5)
        ->count();

        $bulan6 = DB::table('transaksi_pembelian')
        ->select('id_pembelian')
        ->whereMonth('tanggal_pembelian', '=', 6)
        ->count();

        $bulan7 = DB::table('transaksi_pembelian')
        ->select('id_pembelian')
        ->whereMonth('tanggal_pembelian', '=', 7)
        ->count();

        $bulan8 = DB::table('transaksi_pembelian')
        ->select('id_pembelian')
        ->whereMonth('tanggal_pembelian', '=', 8)
        ->count();

        $bulan9 = DB::table('transaksi_pembelian')
        ->select('id_pembelian')
        ->whereMonth('tanggal_pembelian', '=', 9)
        ->count();

        $bulan10 = DB::table('transaksi_pembelian')
        ->select('id_pembelian')
        ->whereMonth('tanggal_pembelian', '=', 10)
        ->count();

        $bulan11 = DB::table('transaksi_pembelian')
        ->select('id_pembelian')
        ->whereMonth('tanggal_pembelian', '=', 11)
        ->count();

        $bulan12 = DB::table('transaksi_pembelian')
        ->select('id_pembelian')
        ->whereMonth('tanggal_pembelian', '=', 12)
        ->count();



        $bulan13 = DB::table('transaksi_penjualan')
        ->select('id_penjualan')
        ->whereMonth('tanggal_penjualan', '=', 1)
        ->count();

        $bulan14 = DB::table('transaksi_penjualan')
        ->select('id_penjualan')
        ->whereMonth('tanggal_penjualan', '=', 2)
        ->count();

        $bulan15 = DB::table('transaksi_penjualan')
        ->select('id_penjualan')
        ->whereMonth('tanggal_penjualan', '=', 3)
        ->count();

        $bulan16 = DB::table('transaksi_penjualan')
        ->select('id_penjualan')
        ->whereMonth('tanggal_penjualan', '=', 4)
        ->count();

        $bulan17 = DB::table('transaksi_penjualan')
        ->select('id_penjualan')
        ->whereMonth('tanggal_penjualan', '=', 5)
        ->count();

        $bulan18 = DB::table('transaksi_penjualan')
        ->select('id_penjualan')
        ->whereMonth('tanggal_penjualan', '=', 6)
        ->count();

        $bulan19 = DB::table('transaksi_penjualan')
        ->select('id_penjualan')
        ->whereMonth('tanggal_penjualan', '=', 7)
        ->count();

        $bulan20 = DB::table('transaksi_penjualan')
        ->select('id_penjualan')
        ->whereMonth('tanggal_penjualan', '=', 8)
        ->count();

        $bulan21 = DB::table('transaksi_penjualan')
        ->select('id_penjualan')
        ->whereMonth('tanggal_penjualan', '=', 9)
        ->count();

        $bulan22 = DB::table('transaksi_penjualan')
        ->select('id_penjualan')
        ->whereMonth('tanggal_penjualan', '=', 10)
        ->count();

        $bulan23 = DB::table('transaksi_penjualan')
        ->select('id_penjualan')
        ->whereMonth('tanggal_penjualan', '=', 11)
        ->count();

        $bulan24 = DB::table('transaksi_penjualan')
        ->select('id_penjualan')
        ->whereMonth('tanggal_penjualan', '=', 12)
        ->count();
 

        return view('beranda',compact('penjualan','pembelian','jual','beli','hasil','barang','stok','tanggal','bulan1','bulan2','bulan3','bulan4','bulan5','bulan6','bulan7','bulan8','bulan9','bulan10','bulan11','bulan12','bulan13','bulan14','bulan15','bulan16','bulan17','bulan18','bulan19','bulan20','bulan21','bulan22','bulan23','bulan24'));
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
