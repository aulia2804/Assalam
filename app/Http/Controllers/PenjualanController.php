<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('transaksi_penjualan')
                    ->select('transaksi_penjualan.id_penjualan','transaksi_penjualan.tanggal_penjualan',
                    'barang.nama_barang','transaksi_penjualan.total_bayar','pelanggan.nama_pelanggan','pelunasan_piutang.status')
                    ->join('detail_penjualan','transaksi_penjualan.id_penjualan','=','detail_penjualan.id_penjualan')
                    ->join('barang','barang.id_barang','=','detail_penjualan.id_barang')
                    ->join('pelanggan','pelanggan.id_pelanggan','=','transaksi_penjualan.id_pelanggan')
                    ->join('pelunasan_piutang','transaksi_peNjualan.id_penjualan','=','pelunasan_piutang.id_penjualan')
                    ->orderBy('id_penjualan')
                    ->get();
        return view('data_transaksi_penjualan')
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
