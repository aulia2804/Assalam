<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Pemasok;
use Carbon\Carbon;
use Alert;
use PDF;
use DB;

class PemasokController extends Controller
{

    public function index()
    {
        $data = Pemasok::where('status_pemasok','Publish')->get();
        return view('pemasok')
        ->with('data', $data);
    }

    public function unduhpemasok()
    {
        $data = Pemasok::where('status_pemasok','Publish')->orderBy('id_pemasok')->get();

        $tanggal_cetak = Carbon::now();

        $pdf = PDF::loadView('printPemasok', array('data'=>$data, 'tanggal_cetak'=>$tanggal_cetak));
        return $pdf->download('Data Pemasok.pdf'); 
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
        //
    }

    public function edit($id)
    {
        $data = Pemasok::where('id_pemasok', $id)->get();
        return view('ubah_pemasok')
            ->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        $data = Pemasok::where('id_pemasok', $id)->first();
        $data->nama_pemasok = $request->nama;
        $data->kontak_pemasok = $request->kontak;
        $data->alamat_pemasok = $request->alamat;
        $data->save();
        Alert::success('Data berhasil diubah', 'Berhasil!');
        return redirect('pemasok');
    }

    public function destroy($id)
    {
        DB::table('pemasok')
        ->where('id_pemasok',$id)
        ->update([
            'status_pemasok' => 'Draft',
            'updated_at' => Carbon::now()
        ]);

        return redirect('pemasok');
    }
}
