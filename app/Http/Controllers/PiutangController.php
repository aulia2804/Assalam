<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\PelunasanPiutang;
use Carbon\Carbon;
use Alert;
use DB;

class PiutangController extends Controller
{

    public function index()
    {
        return view('pelunasan_piutang');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $datar = DB::table('pelunasan_piutang')
            ->select('pelunasan_piutang.id_pelunasan_piutang','transaksi_penjualan.id_penjualan','transaksi_penjualan.sisa_piutang',
            'pelunasan_piutang.tanggal_pelunasan_piutang','pelunasan_piutang.bayar_piutang',
            'pelunasan_piutang.status')
            ->join('transaksi_penjualan','transaksi_penjualan.id_penjualan','=','pelunasan_piutang.id_penjualan')
            ->where('transaksi_penjualan.id_penjualan',$request->id_penjualan)
            ->orderBy('id_pelunasan_piutang')
            ->get();

        $data = DB::table('pelunasan_piutang')
            ->select('pelunasan_piutang.id_pelunasan_piutang','transaksi_penjualan.id_penjualan','transaksi_penjualan.total_bayar','transaksi_penjualan.sisa_piutang','transaksi_penjualan.tanggal_penjualan','pelunasan_piutang.tanggal_pelunasan_piutang','pelunasan_piutang.bayar_piutang',
            'pelunasan_piutang.status')
            ->join('transaksi_penjualan','transaksi_penjualan.id_penjualan','=','pelunasan_piutang.id_penjualan')
            ->where('transaksi_penjualan.id_penjualan',$request->id_penjualan)
            ->orderBy('id_pelunasan_piutang','ASC')
            ->first();

        $message1 = '*Penjualan sudah lunas';
        $message2 = '*Tanggal pelunasan tidak boleh kurang dari tanggal penjualan';

        if(strtotime($request->pelunasan) > strtotime($data->tanggal_penjualan) || strtotime($request->pelunasan) == strtotime($data->tanggal_penjualan))
        {
            if($data->sisa_piutang==0)
            {
                return redirect()->route('pelunasan_piutang.show',['id'=>$request->id_penjualan])
                ->with(compact('message1'));
            }
            else
            {
                $q= DB::table('pelunasan_piutang')
                ->select(DB::raw('id_penjualan as id'), DB::raw('sum(bayar_piutang) as total'))
                ->where('id_penjualan',$request->id_penjualan)
                ->first();
                $sisa=$data->total_bayar-($q->total+$request->uang);
                
                DB::table('transaksi_penjualan')
                ->where('id_penjualan',$request->id_penjualan)
                ->update([
                    'sisa_piutang' => $sisa,
                    'updated_at' => Carbon::now()
                ]);

                $piutang = new PelunasanPiutang;
                $piutang->id_penjualan = $request->id_penjualan;
                $piutang->tanggal_pelunasan_piutang = date("Y-m-d", strtotime($request->pelunasan));
                $piutang->bayar_piutang = $request->uang;
                if ($sisa!=0) {
                    $piutang->status = 'Belum Lunas';
                } else {
                    $piutang->status = 'Lunas';
                }
                $piutang->save();

                Alert::success('Data berhasil ditambah','Berhasil!');
                return redirect()->route('pelunasan_piutang.show',['id'=>$request->id_penjualan]);
            }
        }
        else
        {
            return redirect()->route('pelunasan_piutang.show',['id'=>$request->id_penjualan])
            ->with(compact('message2'));
        }

    }

    public function show($id)
    {
        $data = DB::table('pelunasan_piutang')
            ->select('pelunasan_piutang.id_pelunasan_piutang','transaksi_penjualan.id_penjualan','transaksi_penjualan.total_bayar','transaksi_penjualan.sisa_piutang',
            'pelunasan_piutang.tanggal_pelunasan_piutang','pelunasan_piutang.bayar_piutang',
            'pelunasan_piutang.status')
            ->join('transaksi_penjualan','transaksi_penjualan.id_penjualan','=','pelunasan_piutang.id_penjualan')
            ->where('transaksi_penjualan.id_penjualan',$id)
            ->orderBy('id_pelunasan_piutang','ASC')
            ->get();
        $data1 = DB::table('pelunasan_piutang')
            ->select('pelunasan_piutang.id_pelunasan_piutang','transaksi_penjualan.id_penjualan','transaksi_penjualan.total_bayar','transaksi_penjualan.sisa_piutang',
            'pelunasan_piutang.tanggal_pelunasan_piutang','pelunasan_piutang.bayar_piutang',
            'pelunasan_piutang.status')
            ->join('transaksi_penjualan','transaksi_penjualan.id_penjualan','=','pelunasan_piutang.id_penjualan')
            ->where('transaksi_penjualan.id_penjualan',$id)
            ->groupBy('id_penjualan')
            ->get();
        $id_penjualan = $id;
        return view('pelunasan_piutang',compact('data1','data', 'id_penjualan'));
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
        $lihat = PelunasanPiutang::where('id_pelunasan_piutang',$id)->first();

        $ab = DB::table('pelunasan_piutang')
            ->select('transaksi_penjualan.id_penjualan','transaksi_penjualan.total_bayar','transaksi_penjualan.sisa_piutang','pelunasan_piutang.id_pelunasan_piutang','pelunasan_piutang.bayar_piutang')
            ->join('transaksi_penjualan','transaksi_penjualan.id_penjualan','=','pelunasan_piutang.id_penjualan')
            ->where('id_pelunasan_piutang',$id)
            ->first();

        DB::table('transaksi_penjualan')
        ->where('id_penjualan',$ab->id_penjualan)
        ->update([
            'sisa_piutang' => $ab->sisa_piutang+$ab->bayar_piutang,
            'updated_at' => Carbon::now()
        ]);


        $hapus = PelunasanPiutang::find($id);
        $hapus->delete();

        Alert::success('Data berhasil dihapus','Berhasil!');
        return redirect()->route('pelunasan_piutang.show',['id'=>$lihat->id_penjualan]);
    }
}
