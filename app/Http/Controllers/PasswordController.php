<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;

class PasswordController extends Controller
{

    public function index()
    {
        $id = Auth::user()->id_pengguna;
        $data = DB::table('pengguna')
            ->select('pengguna.id_pengguna','pengguna.nama_pengguna','pengguna.jenis_kelamin','pengguna.kontak_pengguna','pengguna.alamat_pengguna','pengguna.username')
            ->where('id_pengguna',$id)
            ->first();
        return view('ubah_sandi')->with('data', $data);
    }

    public function ubah_sandi(Request $request)
    {
        $id = Auth::user()->id_pengguna;
        DB::table('pengguna')
        ->where('id_pengguna',$id)
        ->update([
            'password' => bcrypt($request->password),
            'updated_at' => Carbon::now()
        ]);

        return redirect('beranda');
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
