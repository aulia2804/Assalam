<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\TransaksiPembelian;
use Response;

class TranPemController extends Controller
{

    public function index()
    {
        return view('transaksi_pembelian');
    }

    public function create()
    {   
        //
    }

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
        return redirect('tambah_barang');
    }

    public function show($id)
    {
        //
    }

    public function detail($id)
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
