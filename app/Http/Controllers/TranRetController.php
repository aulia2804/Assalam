<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\TransaksiPembelian;
use App\ReturPembelian;
use Response;
use DB;

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
        $q = DB::table('transaksi_pembelian')
        ->select('transaksi_pembelian.id_pembelian','transaksi_pembelian.tanggal_pembelian','transaksi_pembelian.tanggal_jatuh_tempo')
        ->where('id_pembelian',$request->pembelian)
        ->first();

        $message1 = '*Tanggal retur tidak boleh lebih dari tanggal jatuh tempo';
        $message2 = '*Tanggal retur tidak boleh kurang dari tanggal pembelian';

        if(strtotime($request->tanggal) > strtotime($q->tanggal_pembelian) || strtotime($request->tanggal)==strtotime($q->tanggal_pembelian))
        {
            if(strtotime($request->tanggal) < strtotime($q->tanggal_jatuh_tempo) || strtotime($request->tanggal)==strtotime($q->tanggal_jatuh_tempo))
            {
                $data = new ReturPembelian();
                $data->tanggal_retur = date('Y-m-d', strtotime($request->tanggal));
                $data->id_pembelian = $request->pembelian;
                $data->save();
                return redirect('tambah_retur');
            }
            else
            {
                return Redirect::to('retur_pembelian')
                ->with(compact('message1'));
            }
        }
        else
        {
            return Redirect::to('retur_pembelian')
            ->with(compact('message2'));
        }
        
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
