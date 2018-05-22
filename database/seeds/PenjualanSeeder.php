<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaksi_penjualan')->insert([
            'id_pengguna' => '1',
            'id_pelanggan' => '1',
            'tanggal_penjualan' => Carbon::create('2018', '05', '16'),
            'cara_penjualan' => 'Kredit',
            'total_bayar' => '100000',
            'uang_muka' => '50000',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
