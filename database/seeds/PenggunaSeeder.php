<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengguna')->insert([
            'nama_pengguna' => 'Assalam',
            'jenis_kelamin' => 'Laki-Laki',
            'kontak_pengguna' => '081222150421',
            'alamat_pengguna' => 'Ds Rejosari Kemiri Purworejo Jawa Tengah',
            'username' => 'pemilik',
            'password' => bcrypt('1234'),
            'rule' => 'Pemilik',
            'status' => 'Active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('pengguna')->insert([
            'nama_pengguna' => 'Aulia',
            'jenis_kelamin' => 'Perempuan',
            'kontak_pengguna' => '081234150421',
            'alamat_pengguna' => 'Ds Rejosari Kemiri Purworejo Jawa Tengah',
            'username' => 'admin',
            'password' => bcrypt('1234'),
            'rule' => 'Admin',
            'status' => 'Active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
