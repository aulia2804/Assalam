<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransaksiPembelian;
use App\Pemasok;
use Response;

class TranPemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemasok = Pemasok::all();
        return view('transaksi_pembelian', compact('pemasok'));

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
        $data = new TransaksiPembelian();
        $data->tanggal_pembelian = date('Y-m-d', strtotime($request->tanggal));
        $data->cara_pembelian = $request->cara;
        $data->tanggal_jatuh_tempo = date('Y-m-d', strtotime($request->kredit));
        $data->id_pengguna = '1';
        $data->total_bayar = '0';
        $data->uang_muka = '0';
        $data->save();
        return redirect('transaksi_pembelian');
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

    public function detail($id)
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

    public function autocomplete($id)
    {
        // $term=$request->term;
        $data=Pemasok::where('id_pemasok',$id)->get();
        // $results=array();
        // foreach ($data as $key => $datas) {
        //     $results[]=['id_pemasok'=>$datas->id_pemasok,'nama_pemasok'=>$datas->nama_pemasok,'kontak_pemasok'=>$datas->kontak_pemasok,'alamat_pemasok'=>$datas->alamat_pemasok];
        // }
        return Response::json($data);
    }
}
