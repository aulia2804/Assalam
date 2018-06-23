<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Pengguna;
use Carbon\Carbon;
use Alert;
use DB;

class PenggunaController extends Controller
{

    public function index()
    {
        $data = Pengguna::all();
        return view('pengguna')
        ->with('data', $data);
    }

    public function create()
    {
        return view('tambah_pengguna');
    }

    public function store(Request $request)
    {
        $message='*nama pengguna yang dimasukkan sudah ada';
        $tes = Pengguna::where('username', $request->username)
        ->count();
        if($tes>0){
            return Redirect::to('tambah_pengguna/create')
            ->with(compact('message'))
			->withInput($request->only('nama','notelp','alamat'));
        }else{
            $data = new Pengguna();
            $data->nama_pengguna = $request->nama;
            $data->jenis_kelamin = $request->jenisKelamin;
            $data->kontak_pengguna = $request->notelp;
            $data->alamat_pengguna = $request->alamat;
            $data->username = $request->username;
            $data->password = bcrypt($request->password);
            $data->rule = $request->jabatan;
            $data->save();
            Alert::success('Data berhasil ditambah', 'Berhasil!');
            return redirect('pengguna');
        }
    }

    public function show($id)
    {
        $data = Pengguna::where('id_pengguna', $id)->get();
        return view('pengguna')
            ->with('data', $data);
        
    }

    public function edit($id)
    {
        $data = Pengguna::where('id_pengguna', $id)->get();
        return view('ubah_pengguna')
            ->with('data', $data);
    }

    //masukin data ke db
    public function update(Request $request, $id)
    {
        $data = Pengguna::where('id_pengguna', $id)->first();
        $data->nama_pengguna = $request->nama;
        $data->jenis_kelamin = $request->jenisKelamin;
        $data->kontak_pengguna = $request->notelp;
        $data->alamat_pengguna = $request->alamat;
        $data->username = $request->username;
        if ($request->password) {
            $data->password = bcrypt($request->password);
        }
        $data->rule = $request->jabatan;
        $data->save();
        Alert::success('Data berhasil diubah', 'Berhasil!');
        return redirect('pengguna');
    }

    public function destroy($id)
    {
        DB::table('pengguna')
            ->where('id_pengguna',$id)
            ->update([
                'status_pengguna' => 'Draft',
                'updated_at' => Carbon::now()
            ]);

        Alert::success('Pengguna telah dihapus','Berhasil!');
        return redirect('pengguna');
    }

    public function active($id)
    {
		DB::table('pengguna')
				->where('id_pengguna', $id)
	            ->update([
				'status' => 'Non Active',
                'updated_at' => Carbon::now()
			]);
		return redirect('pengguna');
	}

    public function nonactive($id)
    {
        DB::table('pengguna')
                ->where('id_pengguna', $id)
                ->update([
                'status' => 'Active',
                'updated_at' => Carbon::now()
            ]);
        return redirect('pengguna');
    }
	
}
