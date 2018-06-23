<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PelunasanHutang;
use Carbon\Carbon;
use Alert;
use SUM;
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
            ->select('pelunasan_hutang.id_pelunasan_hutang','transaksi_pembelian.id_pembelian','transaksi_pembelian.total_bayar','transaksi_pembelian.sisa_hutang',
            'pelunasan_hutang.tanggal_pelunasan_hutang','pelunasan_hutang.bayar_hutang','pelunasan_hutang.status')
            ->join('transaksi_pembelian','transaksi_pembelian.id_pembelian','=','pelunasan_hutang.id_pembelian')
            ->where('transaksi_pembelian.id_pembelian',$request->id_pembelian)
            ->orderBy('id_pelunasan_hutang')
            ->get();

        $data = DB::table('pelunasan_hutang')
            ->select('pelunasan_hutang.id_pelunasan_hutang','transaksi_pembelian.id_pembelian','transaksi_pembelian.total_bayar','transaksi_pembelian.sisa_hutang','transaksi_pembelian.tanggal_pembelian','transaksi_pembelian.tanggal_jatuh_tempo','pelunasan_hutang.tanggal_pelunasan_hutang','pelunasan_hutang.bayar_hutang','pelunasan_hutang.status')
            ->join('transaksi_pembelian','transaksi_pembelian.id_pembelian','=','pelunasan_hutang.id_pembelian')
            ->where('transaksi_pembelian.id_pembelian',$request->id_pembelian)
            ->orderBy('id_pelunasan_hutang','ASC')
            ->first();

        $message1 = '*Tanggal pelunasan tidak boleh kurang dari tanggal pembelian';
        $message2 = '*Tanggal pelunasan tidak boleh lebih dari tanggal jatuh tempo';
        $message3 = '*Pembelian sudah lunas';
        $message4 = '*Uang yang dibayarkan melebihi sisa hutang';

        if(strtotime($request->pelunasan) > strtotime($data->tanggal_pembelian) || strtotime($request->pelunasan) == strtotime($data->tanggal_pembelian))
        {
            if(strtotime($request->pelunasan) < strtotime($data->tanggal_jatuh_tempo) || strtotime($request->pelunasan) == strtotime($data->tanggal_jatuh_tempo))
            {
                if($data->sisa_hutang==0){
                    return redirect()->route('pelunasan_hutang.show',['id'=>$request->id_pembelian])
                    ->with(compact('message3'));
                }
                else
                {
                    if ($request->uang>$data->sisa_hutang) {
                        return redirect()->route('pelunasan_hutang.show',['id'=>$request->id_pembelian])
                        ->with(compact('message4'));
                    } else {
                        $q= DB::table('pelunasan_hutang')
                        ->select(DB::raw('id_pembelian as id'), DB::raw('sum(bayar_hutang) as total'))
                        ->where('id_pembelian',$request->id_pembelian)
                        ->first();
                        $sisa=$data->total_bayar-($q->total+$request->uang);
                        
                        DB::table('transaksi_pembelian')
                        ->where('id_pembelian',$request->id_pembelian)
                        ->update([
                            'sisa_hutang' => $sisa,
                            'updated_at' => Carbon::now()
                        ]);

                        $hutang = new PelunasanHutang;
                        $hutang->id_pembelian = $request->id_pembelian;
                        $hutang->tanggal_pelunasan_hutang = date("Y-m-d", strtotime($request->pelunasan));
                        $hutang->bayar_hutang = $request->uang;
                        if ($sisa!=0) {
                            $hutang->status = 'Belum Lunas';
                        } else {
                            $hutang->status = 'Lunas';
                        }
                        $hutang->save();

                        Alert::success('Data berhasil ditambah','Berhasil!');
                        return redirect()->route('pelunasan_hutang.show',['id'=>$request->id_pembelian]);
                    }
                }
            }
            else
            {
                return redirect()->route('pelunasan_hutang.show',['id'=>$request->id_pembelian])
                ->with(compact('message2'));
            }
        }
        else
        {
            return redirect()->route('pelunasan_hutang.show',['id'=>$request->id_pembelian])
            ->with(compact('message1'));
        }
        
    }

    public function show($id)
    {
        $data = DB::table('pelunasan_hutang')
            ->select('pelunasan_hutang.id_pelunasan_hutang','transaksi_pembelian.id_pembelian','transaksi_pembelian.total_bayar','transaksi_pembelian.sisa_hutang',
            'pelunasan_hutang.tanggal_pelunasan_hutang','pelunasan_hutang.bayar_hutang',
            'pelunasan_hutang.status')
            ->join('transaksi_pembelian','transaksi_pembelian.id_pembelian','=','pelunasan_hutang.id_pembelian')
            ->orderBy('id_pelunasan_hutang')
            ->where('transaksi_pembelian.id_pembelian',$id)
            ->get();
        $data1 = DB::table('pelunasan_hutang')
            ->select('pelunasan_hutang.id_pelunasan_hutang','transaksi_pembelian.id_pembelian','transaksi_pembelian.total_bayar','transaksi_pembelian.sisa_hutang',
            'pelunasan_hutang.tanggal_pelunasan_hutang','pelunasan_hutang.bayar_hutang',
            'pelunasan_hutang.status')
            ->join('transaksi_pembelian','transaksi_pembelian.id_pembelian','=','pelunasan_hutang.id_pembelian')
            ->groupBy('id_pembelian')
            ->where('transaksi_pembelian.id_pembelian',$id)
            ->get();
        $id_pembelian = $id;
        return view('pelunasan_hutang',compact('data1','data', 'id_pembelian'));
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
        $lihat = PelunasanHutang::where('id_pelunasan_hutang',$id)->first();

        $ab = DB::table('pelunasan_hutang')
            ->select('transaksi_pembelian.id_pembelian','transaksi_pembelian.total_bayar','transaksi_pembelian.sisa_hutang','pelunasan_hutang.id_pelunasan_hutang','pelunasan_hutang.bayar_hutang')
            ->join('transaksi_pembelian','transaksi_pembelian.id_pembelian','=','pelunasan_hutang.id_pembelian')
            ->where('id_pelunasan_hutang',$id)
            ->first();

        DB::table('transaksi_pembelian')
        ->where('id_pembelian',$ab->id_pembelian)
        ->update([
            'sisa_hutang' => $ab->sisa_hutang+$ab->bayar_hutang,
            'updated_at' => Carbon::now()
        ]);

        $hapus = PelunasanHutang::find($id);
        $hapus->delete();

        Alert::success('Data berhasil dihapus','Berhasil!');
        return redirect()->route('pelunasan_hutang.show',['id'=>$lihat->id_pembelian]);
    }
}
