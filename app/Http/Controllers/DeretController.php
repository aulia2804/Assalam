<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailReturPembelian;
use App\ReturPembelian;
use App\Barang;
use Carbon\Carbon;
use Alert;
use DB;

class DeretController extends Controller
{
    public function index()
    {
        $dapat_id = DB::table('retur_pembelian')
                ->select('transaksi_pembelian.id_pembelian','retur_pembelian.id_retur_pembelian','retur_pembelian.tanggal_retur')
                ->join('transaksi_pembelian','transaksi_pembelian.id_pembelian','=','retur_pembelian.id_pembelian')
                ->orderBy('id_retur_pembelian','DESC')
                ->first();
        $dapat_pemasok = DB::table('transaksi_pembelian')
                    ->select('transaksi_pembelian.id_pembelian','transaksi_pembelian.tanggal_pembelian','transaksi_pembelian.cara_pembelian','transaksi_pembelian.tanggal_jatuh_tempo','transaksi_pembelian.total_bayar','transaksi_pembelian.uang_muka','detail_pembelian.id_detail_pembelian','barang.id_barang','barang.nama_barang','pemasok.id_pemasok','pemasok.nama_pemasok','pemasok.kontak_pemasok','pemasok.alamat_pemasok')
                    ->join('detail_pembelian','transaksi_pembelian.id_pembelian','=','detail_pembelian.id_pembelian')
                    ->join('barang','barang.id_barang','=','detail_pembelian.id_barang')
                    ->join('pemasok','pemasok.id_pemasok','=','barang.id_pemasok')
                    ->where('transaksi_pembelian.id_pembelian', $dapat_id->id_pembelian)
                    ->orderBy('id_detail_pembelian','ASC')
                    ->get();
        $detail = DB::table('detail_retur_pembelian')
                ->select('detail_retur_pembelian.id_detail_retur','detail_retur_pembelian.jumlah_barang','detail_retur_pembelian.total_harga','detail_retur_pembelian.deskripsi_retur','barang.id_barang','barang.nama_barang','barang.harga_beli')
                ->where('id_retur_pembelian',$dapat_id->id_retur_pembelian)
                ->join('barang','barang.id_barang','=','detail_retur_pembelian.id_barang')
                ->orderBy('id_detail_retur','ASC')
                ->get();
        return view('tambah_retur')
        ->with('detail',$detail)
        ->with('dapat_id',$dapat_id)
        ->with('dapat_pemasok',$dapat_pemasok);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $lihat = Barang::where('id_barang',$request->barang)->first();
        $message='*barang yang tersedia kurang, kurangi jumlah permintaan';

        if($lihat->stok<$request->jumlah)
        {
            Alert::warning('Barang yang tersedia kurang', 'Kesalahan!');
            return redirect('tambah_retur')
            ->with(compact('message'))
            ->withInput($request->only('jumlah','deskripsi'));
        }
        else
        {
            $id = DB::table('retur_pembelian')
                ->select('retur_pembelian.id_retur_pembelian','retur_pembelian.tanggal_retur')
                ->orderBy('id_retur_pembelian', 'DESC')
                ->first();

            $total = $lihat->harga_beli*$request->jumlah;

            $data = new DetailReturPembelian();
            $data->id_retur_pembelian = $id->id_retur_pembelian;
            $data->id_barang = $request->barang;
            $data->jumlah_barang = $request->jumlah;
            $data->total_harga = $total;
            $data->deskripsi_retur = $request->deskripsi;
            $data->save();

            $sisa = $lihat->stok-$request->jumlah;
            
            DB::table('barang')
                ->where('id_barang', $request->barang)
                ->update([
                    'stok' => $sisa,
                    'updated_at' => Carbon::now()
            ]);

            Alert::success('Data retur berhasil ditambah', 'Berhasil!');
            return redirect('tambah_retur');
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
        $dapat_id = DB::table('detail_retur_pembelian')
            ->select('detail_retur_pembelian.id_detail_retur','detail_retur_pembelian.jumlah_barang','detail_retur_pembelian.total_harga','detail_retur_pembelian.deskripsi_retur','barang.id_barang','barang.nama_barang','barang.stok','barang.harga_beli')
            ->where('id_detail_retur',$id)
            ->join('barang','barang.id_barang','=','detail_retur_pembelian.id_barang')
            ->first();
        
        $hasil2=$dapat_id->stok+$dapat_id->jumlah_barang;
        DB::table('barang')
            ->where('id_barang', $dapat_id->id_barang)
            ->update([
                'stok' => $hasil2,
                'updated_at' => Carbon::now()
        ]);

        $hapus = DetailReturPembelian::find($id);
        $hapus->delete();

        Alert::success('Data berhasil dihapus', 'Berhasil!');
        return redirect('tambah_retur');
    }

    public function hapusretur(){
        $cek1 = DB::table('retur_pembelian')
                ->select('transaksi_pembelian.id_pembelian','retur_pembelian.id_retur_pembelian','retur_pembelian.tanggal_retur')
                ->join('transaksi_pembelian','transaksi_pembelian.id_pembelian','=','retur_pembelian.id_pembelian')
                ->orderBy('id_retur_pembelian','DESC')
                ->first();
        $cek2 = DB::table('detail_retur_pembelian')
                ->select('detail_retur_pembelian.id_detail_retur','detail_retur_pembelian.jumlah_barang','detail_retur_pembelian.total_harga','detail_retur_pembelian.deskripsi_retur','barang.id_barang','barang.nama_barang','barang.harga_beli','barang.stok')
                ->where('id_retur_pembelian',$cek1->id_retur_pembelian)
                ->join('barang','barang.id_barang','=','detail_retur_pembelian.id_barang')
                ->orderBy('id_detail_retur','ASC')
                ->get();
       
        foreach ($cek2 as $car) {
            $hasil=$car->stok+$car->jumlah_barang;
            DB::table('barang')
                ->where('id_barang', $car->id_barang)
                ->update([
                    'stok' => $hasil,
                    'updated_at' => Carbon::now()
            ]);
        }
       
        $hapus = ReturPembelian::find($cek1->id_retur_pembelian);
        $hapus->delete();

        Alert::success('Retur berhasil dibatalkan', 'Berhasil!');
        return redirect('retur_pembelian');
    }
}
