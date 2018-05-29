<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransaksiPembelian;
use App\ReturPembelian;
use Response;

class TranRetController extends Controller
{
    public function index()
    {
        $pembelian = TransaksiPembelian::all();
        return view ('retur_pembelian')->with(compact('pembelian'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = new ReturPembelian();
        $data->tanggal_retur = date('Y-m-d', strtotime($request->tanggal));
        $data->id_pembelian = $request->pembelian;
        $data->save();
        return redirect('tambah_retur');
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
        $data = TransaksiPembelian::where('id_pembelian',$id)->get();
        return Response::json($data);
    }
}
