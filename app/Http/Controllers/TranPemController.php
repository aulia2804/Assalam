<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\TransaksiPembelian;
use Response;
use Auth;

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
        $message = '*Kredit, tanggal tidak boleh sama atau kurang dari tanggal pembelian';
        $message2 = '*Tunai, tanggal harus sama dengan tanggal pembelian';

        if($request->cara=='Kredit')
        {
            if(strtotime($request->tanggal) < strtotime($request->kredit))
            {
                $data = new TransaksiPembelian();
                $data->tanggal_pembelian = date('Y-m-d', strtotime($request->tanggal));
                $data->cara_pembelian = $request->cara;
                $data->tanggal_jatuh_tempo = date('Y-m-d', strtotime($request->kredit));
                $data->id_pengguna = Auth::user()->id_pengguna;
                $data->total_bayar = '0';
                $data->uang_muka = '0';
                $data->sisa_hutang = '0';
                $data->save();
                return redirect('tambah_barang');
            }
            else
            {
                return Redirect::to('transaksi_pembelian')
                ->with(compact('message'));
            }
        }else{
            if(strtotime($request->tanggal) == strtotime($request->kredit))
            {
                $data = new TransaksiPembelian();
                $data->tanggal_pembelian = date('Y-m-d', strtotime($request->tanggal));
                $data->cara_pembelian = $request->cara;
                $data->tanggal_jatuh_tempo = date('Y-m-d', strtotime($request->kredit));
                $data->id_pengguna = Auth::user()->id_pengguna;
                $data->total_bayar = '0';
                $data->uang_muka = '0';
                $data->sisa_hutang = '0';
                $data->save();
                return redirect('tambah_barang');
            }
            else
            {
                return Redirect::to('transaksi_pembelian')
                ->with(compact('message2'));
            }
        }
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
