<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailPembelian;
use Carbon\Carbon;
use App\Barang;
use App\Pemasok;
use App\Satuan;
use Alert;
use DB;

class DePemController extends Controller
{

    public function index()
    {
        $data = DB::table('transaksi_pembelian')
                ->select('transaksi_pembelian.id_pembelian','transaksi_pembelian.tanggal_pembelian','transaksi_pembelian.cara_pembelian','transaksi_pembelian.tanggal_jatuh_tempo','transaksi_pembelian.total_bayar','transaksi_pembelian.uang_muka','detail_pembelian.id_detail_pembelian','detail_pembelian.jumlah_barang','detail_pembelian.total_harga','barang.id_barang','barang.nama_barang','barang.harga_beli','barang.harga_jual','barang.stok','pemasok.id_pemasok','pemasok.nama_pemasok','pemasok.kontak_pemasok','pemasok.alamat_pemasok','satuan.id_satuan','satuan.nama_satuan')
                ->join('detail_pembelian','transaksi_pembelian.id_pembelian','=','detail_pembelian.id_detail_pembelian')
                ->join('barang','barang.id_barang','=','detail_pembelian.id_barang')
                ->join('pemasok','pemasok.id_pemasok','=','barang.id_pemasok')
                ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
                ->orderBy('id_pembelian','DESC')
                ->limit(1)
                ->get();
        $id = DB::table('transaksi_pembelian')
            ->select('transaksi_pembelian.id_pembelian','transaksi_pembelian.tanggal_pembelian','transaksi_pembelian.cara_pembelian','transaksi_pembelian.tanggal_jatuh_tempo')
            ->orderBy('id_pembelian', 'DESC')
            ->first();
        $detail = DB::table('detail_pembelian')
            ->select('detail_pembelian.id_detail_pembelian','detail_pembelian.jumlah_barang','detail_pembelian.total_harga','barang.id_barang','barang.nama_barang','barang.harga_jual','barang.harga_beli','satuan.id_satuan','satuan.nama_satuan')
            ->join('barang','barang.id_barang','=','detail_pembelian.id_barang')
            ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
            ->where('id_pembelian','=',$id->id_pembelian)
            ->orderBy('id_detail_pembelian','ASC')
            ->get();
        $data2 = Satuan::all();
        $data3 = Pemasok::all();
        return view('tambah_barang')
        ->with('detail', $detail)
        ->with('data', $data)
        ->with('data2', $data2)
        ->with('data3', $data3)
        ->with('id',$id);
    }

    public function create()
    {
        //
    }

    public function tambahPemasok(Request $request){
        $pemasok = new Pemasok();
        $pemasok->nama_pemasok = $request->nama;
        $pemasok->kontak_pemasok = $request->kontak;
        $pemasok->alamat_pemasok = $request->alamat;
        $pemasok->save();
        Alert::success('Pemasok baru berhasil ditambah', 'Berhasil!');
        return redirect('tambah_barang');
    }

    public function store(Request $request)
    {
        $lihat = Barang::where('nama_barang', $request->barang)
        ->count();
        if($lihat>0){ 
            Alert::warning('Data sudah tersedia', 'Kesalahan!');
            return redirect('tambah_barang');
        }else{
            $data = new Barang();
            $data->nama_barang = $request->barang;
            $data->stok = $request->jumlah;
            $data->harga_beli = $request->beli;
            $data->harga_jual = $request->jual;
            $data->id_pemasok = $request->pemasok;
            $data->id_satuan = $request->satuan;
            $data->save();

            $id_barang = $data->id_barang;
            $total = $request->beli*$request->jumlah;
            $id = DB::table('transaksi_pembelian')
                ->select('transaksi_pembelian.id_pembelian','transaksi_pembelian.tanggal_pembelian','transaksi_pembelian.cara_pembelian','transaksi_pembelian.tanggal_jatuh_tempo')
                ->orderBy('id_pembelian', 'DESC')
                ->first();

            $data2 = new DetailPembelian();
            $data2->id_pembelian = $id->id_pembelian;
            $data2->id_barang = $id_barang;
            $data2->jumlah_barang = $request->jumlah;
            $data2->total_harga = $total;
            $data2->save();

            $q = DB::table('detail_pembelian')
                ->where('id_pembelian', $id->id_pembelian)
                ->sum('total_harga');

            DB::table('transaksi_pembelian')
                ->where('id_pembelian', $id->id_pembelian)
                ->update([
                'total_bayar' => $q,
                'updated_at' => Carbon::now()
            ]);

            Alert::success('Data sudah ditambah', 'Berhasil!');
            return redirect('tambah_barang');
        }
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
