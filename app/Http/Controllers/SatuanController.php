<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Satuan;
use Alert;
use DB;


class SatuanController extends Controller
{

    public function index()
    {
        $data = Satuan::all();
        return view('satuan')
        ->with('data', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $lihat = Satuan::where('nama_satuan', $request->nama)
        ->count();
        if($lihat>0){ 
            Alert::warning('Data sudah tersedia', 'Kesalahan!');
            return redirect('satuan');
        }else{
            $data = new Satuan();
            $data->nama_satuan = $request->nama;
            $data->save();
            Alert::success('Data berhasil ditambah', 'Berhasil!');
            return redirect('satuan');
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
        $data = Satuan::find($id);
        $data->nama_satuan = $request->nama;
        $data->save();
        Alert::success('Data berhasil diubah','Berhasil!');
        return redirect('satuan');
    }

    public function destroy($id)
    {
        //
    }
}
