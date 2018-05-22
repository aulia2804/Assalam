<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pelanggan')->insert([
            'nama_pelanggan' => 'Assalami',
            'kontak_pelanggan' => '081222150452',
            'alamat_pelanggan' => 'Ds Rejosari Kemiri Purworejo Jawa Tengah',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
