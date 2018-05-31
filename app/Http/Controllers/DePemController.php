<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransaksiPembelian;
use App\DetailPembelian;
use App\PelunasanHutang;
use Carbon\Carbon;
use App\Barang;
use App\Pemasok;
use App\Satuan;
use Alert;
use DB;

class DePemController extends Controller
{

    public function index()
    {
        $data = DB::table('transaksi_pembelian')
                ->select('transaksi_pembelian.id_pembelian','transaksi_pembelian.tanggal_pembelian','transaksi_pembelian.cara_pembelian','transaksi_pembelian.tanggal_jatuh_tempo','transaksi_pembelian.total_bayar','transaksi_pembelian.uang_muka','detail_pembelian.id_detail_pembelian','detail_pembelian.jumlah_barang','detail_pembelian.total_harga','barang.id_barang','barang.nama_barang','barang.harga_beli','barang.harga_jual','barang.stok','pemasok.id_pemasok','pemasok.nama_pemasok','pemasok.kontak_pemasok','pemasok.alamat_pemasok','satuan.id_satuan','satuan.nama_satuan')
                ->join('detail_pembelian','transaksi_pembelian.id_pembelian','=','detail_pembelian.id_detail_pembelian')
                ->join('barang','barang.id_barang','=','detail_pembelian.id_barang')
                ->join('pemasok','pemasok.id_pemasok','=','barang.id_pemasok')
                ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
                ->orderBy('id_pembelian','DESC')
                ->first();
        $data_total = TransaksiPembelian::orderBy('id_pembelian', 'DESC')->first();
        $id = DB::table('transaksi_pembelian')
            ->select('transaksi_pembelian.id_pembelian','transaksi_pembelian.tanggal_pembelian','transaksi_pembelian.cara_pembelian','transaksi_pembelian.tanggal_jatuh_tempo')
            ->orderBy('id_pembelian', 'DESC')
            ->first();
        $detail = DB::table('detail_pembelian')
            ->select('detail_pembelian.id_detail_pembelian','detail_pembelian.jumlah_barang','detail_pembelian.total_harga','barang.id_barang','barang.nama_barang','barang.harga_jual','barang.harga_beli','satuan.id_satuan','satuan.nama_satuan')
            ->join('barang','barang.id_barang','=','detail_pembelian.id_barang')
            ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
            ->where('id_pembelian','=',$id->id_pembelian)
            ->orderBy('id_detail_pembelian','ASC')
            ->get();
        $data2 = Satuan::all();
        $data3 = Pemasok::all();
        return view('tambah_barang')
        ->with('data_total', $data_total)
        ->with('detail', $detail)
        ->with('data', $data)
        ->with('data2', $data2)
        ->with('data3', $data3)
        ->with('id',$id);
    }

    public function create()
    {
        //
    }

    public function tambahPemasok(Request $request){
        $pemasok = new Pemasok();
        $pemasok->nama_pemasok = $request->nama;
        $pemasok->kontak_pemasok = $request->kontak;
        $pemasok->alamat_pemasok = $request->alamat;
        $pemasok->save();
        Alert::success('Pemasok baru berhasil ditambah', 'Berhasil!');
        return redirect('tambah_barang');
    }

    public function tambahSatuan(Request $request){
        $satuan = new Satuan();
        $satuan->nama_satuan = $request->nama;
        $satuan->save();
        Alert::success('Satuan baru berhasil ditambah', 'Berhasil!');
        return redirect('tambah_barang');
    }

    public function store(Request $request)
    {
        $lihat = Barang::where('nama_barang', $request->barang)
        ->count();
        $lihat_pemasok = Barang::where('nama_barang',$request->barang)->first();
        if($lihat>0){ 
            if($lihat_pemasok->id_pemasok==$request->pemasok){
                $satuan = Barang::where('nama_barang',$request->barang)->where('id_satuan',$request->satuan)->where('harga_beli',$request->beli)->first(); //+stok
                $satuan2 = Barang::where('nama_barang',$request->barang)->where('Id_satuan',$request->satuan)->get(); //ins
                $satuan3 = Barang::where('nama_barang',$request->barang)->where('harga_beli',$request->beli)->get(); //ins
                    if (count($satuan)>0) {

                        $stok = Barang::find($satuan->id_barang);
                        $stok->stok = $satuan->stok+$request->jumlah;
                        $stok->updated_at = Carbon::now();
                        $stok->save();

                        $total = $request->beli*$request->jumlah;
                        $id = DB::table('transaksi_pembelian')
                            ->select('transaksi_pembelian.id_pembelian','transaksi_pembelian.tanggal_pembelian','transaksi_pembelian.cara_pembelian','transaksi_pembelian.tanggal_jatuh_tempo')
                            ->orderBy('id_pembelian', 'DESC')
                            ->first();

                        $data2 = new DetailPembelian();
                        $data2->id_pembelian = $id->id_pembelian;
                        $data2->id_barang = $satuan->id_barang;
                        $data2->jumlah_barang = $request->jumlah;
                        $data2->total_harga = $total;
                        $data2->save();

                        $q = DB::table('detail_pembelian')
                            ->where('id_pembelian', $id->id_pembelian)
                            ->sum('total_harga');

                        DB::table('transaksi_pembelian')
                            ->where('id_pembelian', $id->id_pembelian)
                            ->update([
                            'total_bayar' => $q,
                            'updated_at' => Carbon::now()
                        ]);

                        Alert::success('Barang berhasil ditambah', 'Berhasil!');
                        return redirect('tambah_barang');

                    }elseif (count($satuan2)>0 || count($satuan3)>0) {
                        $data = new Barang();
                        $data->nama_barang = $request->barang;
                        $data->stok = $request->jumlah;
                        $data->harga_beli = $request->beli;
                        $data->harga_jual = $request->jual;
                        $data->id_pemasok = $request->pemasok;
                        $data->id_satuan = $request->satuan;
                        $data->save();

                        $id_barang = $data->id_barang;
                        $total = $request->beli*$request->jumlah;
                        $id = DB::table('transaksi_pembelian')
                            ->select('transaksi_pembelian.id_pembelian','transaksi_pembelian.tanggal_pembelian','transaksi_pembelian.cara_pembelian','transaksi_pembelian.tanggal_jatuh_tempo')
                            ->orderBy('id_pembelian', 'DESC')
                            ->first();

                        $data2 = new DetailPembelian();
                        $data2->id_pembelian = $id->id_pembelian;
                        $data2->id_barang = $id_barang;
                        $data2->jumlah_barang = $request->jumlah;
                        $data2->total_harga = $total;
                        $data2->save();

                        $q = DB::table('detail_pembelian')
                            ->where('id_pembelian', $id->id_pembelian)
                            ->sum('total_harga');

                        DB::table('transaksi_pembelian')
                            ->where('id_pembelian', $id->id_pembelian)
                            ->update([
                            'total_bayar' => $q,
                            'updated_at' => Carbon::now()
                        ]);

                        Alert::success('Barang berhasil ditambah', 'Berhasil!');
                        return redirect('tambah_barang');
                    }
            }else{
                Alert::warning('Pemasok tidak boleh berbeda', 'Kesalahan!');
                return redirect('tambah_barang');
            }
            
        }else{
            $data = new Barang();
            $data->nama_barang = $request->barang;
            $data->stok = $request->jumlah;
            $data->harga_beli = $request->beli;
            $data->harga_jual = $request->jual;
            $data->id_pemasok = $request->pemasok;
            $data->id_satuan = $request->satuan;
            $data->save();

            $id_barang = $data->id_barang;
            $total = $request->beli*$request->jumlah;
            $id = DB::table('transaksi_pembelian')
                ->select('transaksi_pembelian.id_pembelian','transaksi_pembelian.tanggal_pembelian','transaksi_pembelian.cara_pembelian','transaksi_pembelian.tanggal_jatuh_tempo')
                ->orderBy('id_pembelian', 'DESC')
                ->first();

            $data2 = new DetailPembelian();
            $data2->id_pembelian = $id->id_pembelian;
            $data2->id_barang = $id_barang;
            $data2->jumlah_barang = $request->jumlah;
            $data2->total_harga = $total;
            $data2->save();

            $q = DB::table('detail_pembelian')
                ->where('id_pembelian', $id->id_pembelian)
                ->sum('total_harga');

            DB::table('transaksi_pembelian')
                ->where('id_pembelian', $id->id_pembelian)
                ->update([
                'total_bayar' => $q,
                'updated_at' => Carbon::now()
            ]);

            Alert::success('Barang berhasil ditambah', 'Berhasil!');
            return redirect('tambah_barang');
        }
    }

    public function uangmuka(Request $request)
    {
        $id = DB::table('transaksi_pembelian')
                ->select('transaksi_pembelian.id_pembelian','transaksi_pembelian.tanggal_pembelian','transaksi_pembelian.cara_pembelian','transaksi_pembelian.tanggal_jatuh_tempo','transaksi_pembelian.total_bayar')
                ->orderBy('id_pembelian', 'DESC')
                ->first();
        DB::table('transaksi_pembelian')
            ->where('id_pembelian', $id->id_pembelian)
            ->update([
            'uang_muka' => $request->uangmuka,
            'updated_at' => Carbon::now()
        ]);

        $sisa = $id->total_bayar-$request->uangmuka;

        $pelunasan = new PelunasanHutang();
        $pelunasan->id_pembelian = $id->id_pembelian;
        $pelunasan->tanggal_pelunasan_hutang = $id->tanggal_pembelian;
        $pelunasan->bayar_hutang = $request->uangmuka;
        $pelunasan->sisa_hutang = $sisa;
        if($sisa!=0){
            $pelunasan->status = 'Belum Lunas';
        }else{
            $pelunasan->status = 'Lunas';
        }
        $pelunasan->status_hutang = 'Publish';
        $pelunasan->save();

        return redirect('data_transaksi_pembelian');
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
        $dapat_id = DB::table('detail_pembelian')
            ->select('transaksi_pembelian.id_pembelian','transaksi_pembelian.total_bayar','detail_pembelian.id_detail_pembelian','detail_pembelian.jumlah_barang','detail_pembelian.total_harga','barang.id_barang','barang.nama_barang','barang.stok')
            ->where('id_detail_pembelian',$id)
            ->join('transaksi_pembelian','transaksi_pembelian.id_pembelian','=','detail_pembelian.id_pembelian')
            ->join('barang','barang.id_barang','=','detail_pembelian.id_barang')
            ->first();

        $hasil = $dapat_id->total_bayar-$dapat_id->total_harga;
        DB::table('transaksi_pembelian')
            ->where('id_pembelian', $dapat_id->id_pembelian)
            ->update([
                'total_bayar' => $hasil,
                'updated_at' => Carbon::now()
        ]);
        
        $hapus = DetailPembelian::find($id);
        $hapus->delete();

        $hapus2 = Barang::find($dapat_id->id_barang);
        $hapus2->delete();

        Alert::success('Data berhasil dihapus', 'Berhasil!');
        return redirect('tambah_barang');
    }

    public function hapuspembelian()
    {
        $cek = DB::table('transaksi_pembelian')
            ->select('transaksi_pembelian.id_pembelian','transaksi_pembelian.tanggal_pembelian','transaksi_pembelian.cara_pembelian','transaksi_pembelian.tanggal_jatuh_tempo','transaksi_pembelian.total_bayar','transaksi_pembelian.uang_muka')
            ->orderBy('id_pembelian','DESC')
            ->first();
        $cek2 = DB::table('detail_pembelian')
            ->select('detail_pembelian.id_detail_pembelian','detail_pembelian.jumlah_barang','detail_pembelian.total_harga','barang.id_barang','barang.nama_barang','barang.harga_jual','barang.stok','barang.harga_beli','satuan.id_satuan','satuan.nama_satuan')
            ->join('barang','barang.id_barang','=','detail_pembelian.id_barang')
            ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
            ->where('id_pembelian','=',$cek->id_pembelian)
            ->orderBy('id_detail_pembelian','ASC')
            ->get();
        $cari2 = DetailPembelian::where('id_pembelian', $cek->id_pembelian)->get();
        $jumlah2 = $cari2->count();
       
        $i=0;
        $id_barang = array();
        foreach ($cek2 as $car) {
            $id = Barang::select('id_barang')->where('id_barang', $car->id_barang)->first();
            $id_barang[$i] = $id->id_barang;
            $i++;
        }
       
        $hapus2 = TransaksiPembelian::find($cek->id_pembelian);
        $hapus2->delete();

        foreach ($id_barang as $barang ) {
            $hapus = Barang::find($barang);
            $hapus->delete();
        }

        Alert::success('Pembelian berhasil dibatalkan', 'Berhasil!');
        return redirect('transaksi_pembelian');
    }
}
