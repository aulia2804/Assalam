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
                'barang.harga_jual','barang.stok','satuan.nama_satuan','pemasok.nama_pemasok')
                ->join('pemasok','pemasok.id_pemasok','=','barang.id_pemasok')
                ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
                ->where('status_barang','Publish')
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
        DB::table('barang')
        ->where('id_barang',$id)
        ->update([
            'status_barang' => 'Draft',
            'updated_at' => Carbon::now()
        ]);

        Alert::success('Barang berhasil dihapus','Berhasil!');
        return redirect('barang');
    }
}
