<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Pelanggan;
use Carbon\Carbon;
use Alert;
use PDF;

class PelangganController extends Controller
{

    public function index()
    {
        $data = Pelanggan::all();
        return view('pelanggan')
        ->with('data', $data);
    }

    public function create()
    {
        return view('transaksi_penjualan');
    }

    public function unduhpelanggan()
    {
        $data = Pelanggan::where('status_pelanggan','Publish')->orderBy('id_pelanggan')->get();

        $tanggal_cetak = Carbon::now();

        $pdf = PDF::loadView('printPelanggan', array('data'=>$data, 'tanggal_cetak'=>$tanggal_cetak));
        return $pdf->download('Data Pelanggan.pdf'); 
    }

    public function store(Request $request)
    {
        $data = new Pelanggan();
        $data->nama_pelanggan = $request->nama;
        $data->kontak_pelanggan = $request->kontak;
        $data->alamat_pelanggan = $request->alamat;
        $data->save();
        return redirect('pelanggan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Pelanggan::where('id_pelanggan', $id)->get();
        return view('ubah_pelanggan')
            ->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        $data = Pelanggan::where('id_pelanggan', $id)->first();
        $data->nama_pelanggan = $request->nama;
        $data->kontak_pelanggan = $request->kontak;
        $data->alamat_pelanggan = $request->alamat;
        $data->save();
        Alert::success('Data berhasil diubah', 'Berhasil!');
        return redirect('pelanggan');
    }

    public function destroy($id)
    {
        $a = DB::table('transaksi_penjualan')
            ->select('pelanggan.id_pelanggan','pelanggan.nama_pelanggan','transaksi_penjualan.id_penjualan','transaksi_penjualan.tanggal_penjualan','detail_penjualan.id_detail_penjualan','pelunasan_piutang.id_pelunasan_piutang')
            ->join('pelanggan','pelanggan.id_pelanggan','=','transaksi_penjualan.id_pelanggan')
            ->join('detail_penjualan','transaksi_penjualan.id_penjualan','=','detail_penjualan.id_penjualan')
            ->join('pelunasan_piutang','transaksi_penjualan.id_penjualan','=','pelunasan_piutang.id_penjualan')
            ->where('pelanggan.id_pelanggan',$id)
            ->get();
        DB::table('pelanggan')
        ->where('id_pelanggan',$id)
        ->update([
            'status_pelanggan' => 'Draft',
            'updated_at' => Carbon::now()
        ]);

        return redirect('pelanggan');
    }
}
