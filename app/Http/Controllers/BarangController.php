<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Barang;
use App\Satuan;
use Carbon\Carbon;
use Alert;
use PDF;
use DB;

class BarangController extends Controller
{
 
    public function index()
    {
        $data = DB::table('barang')
                ->select('barang.id_barang','barang.nama_barang','barang.harga_beli',
                'barang.harga_jual','barang.stok','barang.status_barang','satuan.nama_satuan','pemasok.nama_pemasok')
                ->join('pemasok','pemasok.id_pemasok','=','barang.id_pemasok')
                ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
                ->orderBy('id_barang')
                ->get();
        $data2 = Satuan::all();
        return view('barang')
        ->with('data', $data)
        ->with('data1', $data2);
    }

    public function unduhbarang()
    {
        $data = DB::table('barang')
        ->select('barang.id_barang','barang.status_barang','barang.nama_barang','barang.harga_beli','barang.harga_jual','barang.stok','pemasok.id_pemasok','pemasok.nama_pemasok','satuan.id_satuan','satuan.nama_satuan')
        ->join('pemasok','pemasok.id_pemasok','=','barang.id_pemasok')
        ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
        ->where('status_barang','Publish')
        ->orderBy('id_barang')
        ->get();

        $tanggal_cetak = Carbon::now();

        $pdf = PDF::loadView('printBarang', array('data'=>$data, 'tanggal_cetak'=>$tanggal_cetak));
        return $pdf->download('Data Barang.pdf'); 
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
        $data = Barang::where('id_barang', $id)->first();
        $data->nama_barang = $request->nama;
        $data->harga_beli = $request->beli;
        $data->harga_jual = $request->jual;
        $data->stok = $request->stock;
        $data->id_satuan = $request->satuan;
        $data->save();

        Alert::success('Barang berhasil diubah','Berhasil!');
        return redirect('barang');
        
    }

    public function destroy($id)
    {
        //
    }

    public function aktif($id)
    {
        DB::table('barang')
                ->where('id_barang', $id)
                ->update([
                'status_barang' => 'Draft',
                'updated_at' => Carbon::now()
            ]);
        return redirect('barang');
    }

    public function tidakaktif($id)
    {   
        DB::table('barang')
                ->where('id_barang', $id)
                ->update([
                'status_barang' => 'Publish',
                'updated_at' => Carbon::now()
            ]);
        return redirect('barang');
    
        // $barang = Barang::where('id_barang',$id)->first();
        // $tes = Barang::where('nama_barang', $barang->nama_barang)->where('status_barang','Publish')
        // ->count();
        // if ($tes>0) {
        //     $cek = Barang::where('nama_barang',$barang->nama_barang)->where('status_barang','Publish')->first();
        //     if($barang->id_pemasok==$cek->id_pemasok){
        //         DB::table('barang')
        //             ->where('id_barang', $id)
        //             ->update([
        //             'status_barang' => 'Publish',
        //             'updated_at' => Carbon::now()
        //         ]);
        //         Alert::success('Barang berhasil diaktifkan','Berhasil!');
        //         return redirect('barang');
        //     }else{
        //         Alert::warning('Nama pemasok berbeda','Kesalahan!');
        //         return redirect('barang');
        //     }
        // } else {
        //     DB::table('barang')
        //         ->where('id_barang', $id)
        //         ->update([
        //         'status_barang' => 'Publish',
        //         'updated_at' => Carbon::now()
        //     ]);
        //     Alert::success('Barang berhasil diaktifkan','Berhasil!');
        //     return redirect('barang');
        // } 
    }
}
