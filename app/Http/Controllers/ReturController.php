<?php

namespace App\Http\Controllers;
use App\DetailReturPembelian;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Alert;
use DB;
use PDF;

class ReturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('retur_pembelian')
                ->select('retur_pembelian.id_retur_pembelian','retur_pembelian.tanggal_retur',
                'barang.nama_barang','detail_retur_pembelian.id_detail_retur','detail_retur_pembelian.jumlah_barang','pemasok.nama_pemasok','detail_retur_pembelian.deskripsi_retur','detail_retur_pembelian.proses','barang.stok')
                ->join('detail_retur_pembelian','retur_pembelian.id_retur_pembelian','=','detail_retur_pembelian.id_retur_pembelian')
                ->join('barang','barang.id_barang','=','detail_retur_pembelian.id_barang')
                ->join('pemasok','pemasok.id_pemasok','=','barang.id_pemasok')
                ->orderBy('id_retur_pembelian', 'ASC')
                ->groupBy('id_retur_pembelian')
                ->get();
        return view('data_retur_pembelian')
        ->with('data', $data);
    }

    public function unduhretur($id){

        $a = DB::table('retur_pembelian')
        ->select('retur_pembelian.id_retur_pembelian','retur_pembelian.tanggal_retur','detail_retur_pembelian.id_detail_retur','detail_retur_pembelian.jumlah_barang','detail_retur_pembelian.deskripsi_retur','barang.id_barang','barang.nama_barang','pemasok.id_pemasok','pemasok.nama_pemasok','pemasok.kontak_pemasok','pemasok.alamat_pemasok','transaksi_pembelian.id_pembelian','transaksi_pembelian.tanggal_pembelian','transaksi_pembelian.cara_pembelian','transaksi_pembelian.tanggal_jatuh_tempo')
        ->join('transaksi_pembelian','transaksi_pembelian.id_pembelian','=','retur_pembelian.id_pembelian')
        ->join('detail_retur_pembelian','retur_pembelian.id_retur_pembelian','=','detail_retur_pembelian.id_retur_pembelian')
        ->join('barang','barang.id_barang','=','detail_retur_pembelian.id_barang')
        ->join('pemasok','pemasok.id_pemasok','=','barang.id_pemasok')
        ->where('retur_pembelian.id_retur_pembelian',$id)
        ->groupBy('id_retur_pembelian')
        ->get();
        $b = DB::table('retur_pembelian')
        ->select('retur_pembelian.id_retur_pembelian','retur_pembelian.tanggal_retur','detail_retur_pembelian.id_detail_retur','detail_retur_pembelian.jumlah_barang','detail_retur_pembelian.deskripsi_retur','barang.id_barang','barang.nama_barang','pemasok.id_pemasok','pemasok.nama_pemasok','pemasok.kontak_pemasok','pemasok.alamat_pemasok')
        ->join('detail_retur_pembelian','retur_pembelian.id_retur_pembelian','=','detail_retur_pembelian.id_retur_pembelian')
        ->join('barang','barang.id_barang','=','detail_retur_pembelian.id_barang')
        ->join('pemasok','pemasok.id_pemasok','=','barang.id_pemasok')
        ->where('retur_pembelian.id_retur_pembelian',$id)
        ->groupBy('id_pemasok')
        ->get();
        $c = DB::table('retur_pembelian')
        ->select('retur_pembelian.id_retur_pembelian','retur_pembelian.tanggal_retur','detail_retur_pembelian.id_detail_retur','detail_retur_pembelian.jumlah_barang','detail_retur_pembelian.deskripsi_retur','detail_retur_pembelian.total_harga','barang.id_barang','barang.harga_beli','barang.nama_barang','pemasok.id_pemasok','pemasok.nama_pemasok','pemasok.kontak_pemasok','pemasok.alamat_pemasok')
        ->join('detail_retur_pembelian','retur_pembelian.id_retur_pembelian','=','detail_retur_pembelian.id_retur_pembelian')
        ->join('barang','barang.id_barang','=','detail_retur_pembelian.id_barang')
        ->join('pemasok','pemasok.id_pemasok','=','barang.id_pemasok')
        ->where('retur_pembelian.id_retur_pembelian',$id)
        ->orderBy('id_detail_retur','ASC')
        ->get();

        $tanggal_cetak = Carbon::now();

        $pdf = PDF::loadView('printRetur', array('a'=>$a, 'b'=>$b, 'c'=>$c, 'tanggal_cetak'=>$tanggal_cetak));
        return $pdf->download('Retur Pembelian.pdf'); 
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
        $aa = DB::table('retur_pembelian')
        ->select('retur_pembelian.id_retur_pembelian','retur_pembelian.tanggal_retur','detail_retur_pembelian.id_detail_retur','detail_retur_pembelian.jumlah_barang','detail_retur_pembelian.deskripsi_retur','barang.id_barang','barang.nama_barang','pemasok.id_pemasok','pemasok.nama_pemasok','pemasok.kontak_pemasok','pemasok.alamat_pemasok')
        ->join('detail_retur_pembelian','retur_pembelian.id_retur_pembelian','=','detail_retur_pembelian.id_retur_pembelian')
        ->join('barang','barang.id_barang','=','detail_retur_pembelian.id_barang')
        ->join('pemasok','pemasok.id_pemasok','=','barang.id_pemasok')
        ->where('retur_pembelian.id_retur_pembelian',$id)
        ->groupBy('id_retur_pembelian')
        ->get();
        $bb = DB::table('retur_pembelian')
        ->select('retur_pembelian.id_retur_pembelian','retur_pembelian.tanggal_retur','detail_retur_pembelian.id_detail_retur','detail_retur_pembelian.jumlah_barang','detail_retur_pembelian.deskripsi_retur','barang.id_barang','barang.nama_barang','pemasok.id_pemasok','pemasok.nama_pemasok','pemasok.kontak_pemasok','pemasok.alamat_pemasok')
        ->join('detail_retur_pembelian','retur_pembelian.id_retur_pembelian','=','detail_retur_pembelian.id_retur_pembelian')
        ->join('barang','barang.id_barang','=','detail_retur_pembelian.id_barang')
        ->join('pemasok','pemasok.id_pemasok','=','barang.id_pemasok')
        ->where('retur_pembelian.id_retur_pembelian',$id)
        ->groupBy('id_pemasok')
        ->get();
        $cc = DB::table('retur_pembelian')
        ->select('retur_pembelian.id_retur_pembelian','retur_pembelian.tanggal_retur','detail_retur_pembelian.id_detail_retur','detail_retur_pembelian.jumlah_barang','detail_retur_pembelian.deskripsi_retur','detail_retur_pembelian.total_harga','barang.id_barang','barang.harga_beli','barang.nama_barang','pemasok.id_pemasok','pemasok.nama_pemasok','pemasok.kontak_pemasok','pemasok.alamat_pemasok')
        ->join('detail_retur_pembelian','retur_pembelian.id_retur_pembelian','=','detail_retur_pembelian.id_retur_pembelian')
        ->join('barang','barang.id_barang','=','detail_retur_pembelian.id_barang')
        ->join('pemasok','pemasok.id_pemasok','=','barang.id_pemasok')
        ->where('retur_pembelian.id_retur_pembelian',$id)
        ->orderBy('id_detail_retur','ASC')
        ->get();
        return view('detail_retur',compact('aa','bb','cc'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $deskripsi = DetailReturPembelian::where('id_detail_retur',$id)->first();

        DB::table('detail_retur_pembelian')
                ->where('id_detail_retur', $id)
                ->update([
                'deskripsi_retur' => $request->deskripsi,
                'updated_at' => Carbon::now()
            ]);

            Alert::success('Deskripsi retur berhasil diubah', 'Berhasil!');
            return redirect('data_retur_pembelian');
    }

    public function destroy($id)
    {
        //
    }

    public function proses($id){

        DB::table('detail_retur_pembelian')
        ->where('id_detail_retur', $id)
        ->update([
            'proses' => 'Selesai',
            'updated_at' => Carbon::now()
        ]);

        $id_barang = DB::table('detail_retur_pembelian')
                ->select('detail_retur_pembelian.id_detail_retur','detail_retur_pembelian.jumlah_barang','detail_retur_pembelian.total_harga','detail_retur_pembelian.proses','barang.id_barang','barang.stok')
                ->join('barang','barang.id_barang','=','detail_retur_pembelian.id_barang')
                ->where('id_detail_retur',$id)
                ->first();

        $stok = $id_barang->stok+$id_barang->jumlah_barang;

        DB::table('barang')
        ->where('id_barang', $id_barang->id_barang)
        ->update([
            'stok' => $stok,
            'updated_at' => Carbon::now()
        ]);

        Alert::success('Retur sudah selesai', 'Berhasil!');
        return redirect('data_retur_pembelian');
    }

}
