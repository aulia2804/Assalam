<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PiutangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pelunasan_piutang')->insert([
            'id_penjualan' => '1',
            'tanggal_pelunasan_piutang' => Carbon::create('2018', '05', '16'),
            'bayar_piutang' => '30000',
            'sisa_piutang' => '20000',
            'status' => 'belum lunas',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
