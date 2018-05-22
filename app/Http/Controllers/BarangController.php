<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Barang;
use App\Satuan;
use DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
