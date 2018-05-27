<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\DetailPenjualan;
use Carbon\Carbon;
use App\Pelanggan;
use App\Satuan;
use App\Barang;
use Response;
use Alert;
use App\TransaksiPenjualan;

use DB;

class DePenController extends Controller
{

    public function index()
    {
        $data = DB::table('transaksi_penjualan')
                ->select('transaksi_penjualan.id_penjualan','transaksi_penjualan.tanggal_penjualan','transaksi_penjualan.cara_penjualan','transaksi_penjualan.total_bayar','transaksi_penjualan.uang_muka','detail_penjualan.id_detail_penjualan','detail_penjualan.jumlah_barang','detail_penjualan.total_harga','barang.id_barang','barang.nama_barang','barang.harga_beli','barang.harga_jual','barang.stok','pelanggan.id_pelanggan','pelanggan.nama_pelanggan','pelanggan.kontak_pelanggan','pelanggan.alamat_pelanggan','satuan.id_satuan','satuan.nama_satuan')
                ->join('detail_penjualan','transaksi_penjualan.id_penjualan','=','detail_penjualan.id_detail_penjualan')
                ->join('barang','barang.id_barang','=','detail_penjualan.id_barang')
                ->join('pelanggan','pelanggan.id_pelanggan','=','transaksi_penjualan.id_pelanggan')
                ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
                ->orderBy('id_penjualan','DESC')
                ->first();
                $data_total = TransaksiPenjualan::orderBy('id_penjualan', 'DESC')->first();
                // dd($data_total);
        $id = DB::table('transaksi_penjualan')
            ->select('transaksi_penjualan.id_penjualan','transaksi_penjualan.tanggal_penjualan','transaksi_penjualan.cara_penjualan','pelanggan.id_pelanggan','pelanggan.nama_pelanggan','pelanggan.kontak_pelanggan','pelanggan.alamat_pelanggan')
            ->join('pelanggan','pelanggan.id_pelanggan','=','transaksi_penjualan.id_pelanggan')
            ->orderBy('id_penjualan', 'DESC')
            ->first();
        $detail = DB::table('detail_penjualan')
            ->select('detail_penjualan.id_detail_penjualan','detail_penjualan.jumlah_barang','detail_penjualan.total_harga','barang.id_barang','barang.nama_barang','barang.harga_jual','barang.harga_beli','satuan.id_satuan','satuan.nama_satuan')
            ->join('barang','barang.id_barang','=','detail_penjualan.id_barang')
            ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
            ->where('id_penjualan','=',$id->id_penjualan)
            ->orderBy('id_detail_penjualan','ASC')
            ->get();
        $satuan = Satuan::all();
        $barang = Barang::all();
        return view('tambah_penjualan')
        ->with('detail', $detail)
        ->with('barang', $barang)
        ->with('satuan', $satuan)
        ->with('data', $data)
        ->with('data_total', $data_total)
        ->with('id',$id);
    }

    public function create()
    {
        //
    }

    public function tambahPelanggan(Request $request){
        $pelanggan = new Pelanggan();
        $pelanggan->nama_pelanggan = $request->nama;
        $pelanggan->kontak_pelanggan = $request->kontak;
        $pelanggan->alamat_pelanggan = $request->alamat;
        $pelanggan->save();
        Alert::success('Pelanggan baru berhasil ditambah', 'Berhasil!');
        return redirect('transaksi_penjualan');
    }

    public function store(Request $request)
    {
        $lihat = Barang::where('id_barang', $request->barang)->first();
        $message='*barang yang tersedia kurang, kurangi jumlah permintaan';

        if($lihat->stok<$request->jumlah){ 

            Alert::warning('Barang yang tersedia kurang', 'Kesalahan!');
            return redirect('tambah_penjualan')
            ->with(compact('message'))
            ->withInput($request->only('jumlah'));
            
        }else{

            $id = DB::table('transaksi_penjualan')
                ->select('transaksi_penjualan.id_penjualan','transaksi_penjualan.tanggal_penjualan','transaksi_penjualan.cara_penjualan')
                ->orderBy('id_penjualan', 'DESC')
                ->first();

            $total = $request->harga*$request->jumlah;

            $data = new DetailPenjualan();
            $data->id_penjualan = $id->id_penjualan;
            $data->id_barang = $request->barang;
            $data->jumlah_barang = $request->jumlah;
            $data->total_harga = $total;
            $data->save();

            $sisa = $lihat->stok-$request->jumlah;
            
            DB::table('barang')
                ->where('id_barang', $request->barang)
                ->update([
                    'stok' => $sisa,
                    'updated_at' => Carbon::now()
            ]);

            $q = DB::table('detail_penjualan')
                ->where('id_penjualan', $id->id_penjualan)
                ->sum('total_harga');

            DB::table('transaksi_penjualan')
                ->where('id_penjualan', $id->id_penjualan)
                ->update([
                'total_bayar' => $q,
                'updated_at' => Carbon::now()
            ]);

            Alert::warning('Data sudah ditambah', 'Berhasil!');
            return redirect('tambah_penjualan');
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

    public function autocomplete($id)
    {
        $data = Barang::where('id_barang',$id)->get();
        return Response::json($data);
    }
}