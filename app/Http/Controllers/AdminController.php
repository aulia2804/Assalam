<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengguna;
use DB;
use Auth;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id_pengguna;
        $data = DB::table('pengguna')
            ->select('pengguna.id_pengguna','pengguna.nama_pengguna','pengguna.jenis_kelamin','pengguna.kontak_pengguna','pengguna.alamat_pengguna','pengguna.username')
            ->where('id_pengguna',$id)
            ->first();
        return view('ubah_profil')->with('data', $data);
    }

    public function create()
    {
        //
    }

    public function update_profil(Request $request)
    {
        $id = Auth::user()->id_pengguna;
        DB::table('pengguna')
        ->where('id_pengguna',$request->id_pengguna)
        ->update([
            'nama_pengguna' => $request->nama,
            'jenis_kelamin' => $request->jenisKelamin,
            'kontak_pengguna' => $request->notelp,
            'alamat_pengguna' => $request->alamat,
            'username' => $request->username,
            'updated_at' => Carbon::now()
        ]);

        return redirect('ubah_profil');
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

        $data = Pengguna::where('id_pengguna', $id)->first();
        $data->nama_pengguna = $request->nama;
        $data->jenis_kelamin = $request->jenisKelamin;
        $data->kontak_pengguna = $request->notelp;
        $data->alamat_pengguna = $request->alamat;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect('ubah_profil');
    }

    public function destroy($id)
    {
        //
    }
}
