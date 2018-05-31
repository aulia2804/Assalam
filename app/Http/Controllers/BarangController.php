<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Barang;
use App\Satuan;
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
                ->orderBy('id_barang')
                ->get();
        $data2 = Satuan::all();
        return view('barang')
        ->with('data', $data)
        ->with('data1', $data2);

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
        return redirect('barang');
        
    }

    public function destroy($id)
    {
        //
    }
}
