<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PelunasanHutang;
use Alert;
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
        $datar = DB::table('pelunasan_hutang')
            ->select('pelunasan_hutang.id_pelunasan_hutang','transaksi_pembelian.id_pembelian',
            'pelunasan_hutang.tanggal_pelunasan_hutang','pelunasan_hutang.bayar_hutang','pelunasan_hutang.sisa_hutang',
            'pelunasan_hutang.status')
            ->join('transaksi_pembelian','transaksi_pembelian.id_pembelian','=','pelunasan_hutang.id_pembelian')
            ->where('transaksi_pembelian.id_pembelian',$request->id_pembelian)
            ->groupBy('id_pembelian')
            ->orderBy('id_pelunasan_hutang','ASC')
            ->first();

        $sisa = $datar->sisa_hutang-$request->uang;

        $hutang = new PelunasanHutang;
        $hutang->id_pembelian = $datar->id_pembelian;
        $hutang->tanggal_pelunasan_hutang = $request->pelunasan;
        $hutang->bayar_hutang = $request->uang;
        $hutang->sisa_hutang = $sisa;
        if ($sisa!=0) {
            $hutang->status = 'Belum Lunas';
        } else {
            $hutang->status = 'Lunas';
        }
        $hutang->save();

        Alert::success('Data berhasil ditambah','Berhasil!');
        return redirect('pelunasan_hutang');
        
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
        $id_pembelian = $id;
        return view('pelunasan_hutang',compact('data', 'id_pembelian'));
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
