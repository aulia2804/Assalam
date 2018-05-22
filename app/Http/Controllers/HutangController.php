<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HutangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $data = DB::table('pelunasan_hutang')
            ->select('pelunasan_hutang.id_pelunasan_hutang','transaksi_pembelian.id_pembelian',
            'pelunasan_hutang.tanggal_pelunasan_hutang','pelunasan_hutang.bayar_hutang','pelunasan_hutang.sisa_hutang',
            'pelunasan_hutang.status')
            ->join('transaksi_pembelian','transaksi_pembelian.id_pembelian','=','pelunasan_hutang.id_pembelian')
            ->orderBy('id_pelunasan_hutang')
            ->where('transaksi_pembelian.id_pembelian',$id)
            ->get();
        return view('pelunasan_hutang')
        ->with('data', $data);
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
