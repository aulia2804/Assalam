<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HutangController extends Controller
{
    public function index()
    {
        return view('pelunasan_hutang');
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
        $data = DB::table('pelunasan_hutang')
            ->select('pelunasan_hutang.id_pelunasan_hutang','transaksi_pembelian.id_pembelian',
            'pelunasan_hutang.tanggal_pelunasan_hutang','pelunasan_hutang.bayar_hutang','pelunasan_hutang.sisa_hutang',
            'pelunasan_hutang.status')
            ->join('transaksi_pembelian','transaksi_pembelian.id_pembelian','=','pelunasan_hutang.id_pembelian')
            ->orderBy('id_pelunasan_hutang')
            ->where('transaksi_pembelian.id_pembelian',$id)
            ->get();
        return view('pelunasan_hutang',compact('data'));
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
}
