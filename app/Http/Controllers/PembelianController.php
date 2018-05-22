<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('transaksi_pembelian')
            ->select('transaksi_pembelian.id_pembelian','transaksi_pembelian.tanggal_pembelian',
            'transaksi_pembelian.tanggal_jatuh_tempo','barang.nama_barang','transaksi_pembelian.total_bayar',
            'pemasok.nama_pemasok','pelunasan_hutang.status')
            ->join('detail_pembelian','transaksi_pembelian.id_pembelian','=','detail_pembelian.id_pembelian')
            ->join('barang','barang.id_barang','=','detail_pembelian.id_barang')
            ->join('pemasok','pemasok.id_pemasok','=','barang.id_pemasok')
            ->join('pelunasan_hutang','transaksi_pembelian.id_pembelian','=','pelunasan_hutang.id_pembelian')
            ->orderBy('id_pembelian')
            ->get();
        return view('data_transaksi_pembelian')
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
