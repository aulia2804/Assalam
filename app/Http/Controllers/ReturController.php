<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ReturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('retur_pembelian')
                    ->select('retur_pembelian.id_retur_pembelian','retur_pembelian.tanggal_retur',
                    'barang.nama_barang','detail_retur_pembelian.jumlah_barang','pemasok.nama_pemasok','detail_retur_pembelian.deskripsi_retur')
                    ->join('detail_retur_pembelian','retur_pembelian.id_retur_pembelian','=','detail_retur_pembelian.id_retur_pembelian')
                    ->join('barang','barang.id_barang','=','detail_retur_pembelian.id_barang')
                    ->join('pemasok','pemasok.id_pemasok','=','barang.id_pemasok')
                    ->orderBy('id_retur_pembelian')
                    ->get();
        return view('data_retur_pembelian')
        ->with('data', $data);
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
        //
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
