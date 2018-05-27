<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransaksiPenjualan;
use App\Pelanggan;
use Response;

class TranPenController extends Controller
{

    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('transaksi_penjualan')->with(compact('pelanggan'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = new TransaksiPenjualan();
        $data->id_pengguna = '1';
        $data->tanggal_penjualan = date('Y-m-d', strtotime($request->tanggal));
        $data->cara_penjualan = $request->cara;
        $data->id_pelanggan = $request->pelanggan;
        $data->total_bayar = '0';
        $data->uang_muka = '0';
        $data->save();
        return redirect('tambah_penjualan');
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
        //
    }

    public function destroy($id)
    {
        //
    }

    public function autocomplete($id)
    {
        $data = Pelanggan::where('id_pelanggan',$id)->get();
        return Response::json($data);
    }
    
}
