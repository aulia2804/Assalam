<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PembelianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaksi_pembelian')->insert([
            'id_pengguna' => '1',
            'tanggal_pembelian' => Carbon::create('2018', '05', '10'),
            'cara_pembelian' => 'Kredit',
            'tanggal_jatuh_tempo' => Carbon::create('2018', '05', '20'),
            'total_bayar' => '50000',
            'uang_muka' => '35000',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('transaksi_pembelian')->insert([
            'id_pengguna' => '1',
            'tanggal_pembelian' => Carbon::create('2018', '05', '10'),
            'cara_pembelian' => 'Kredit',
            'tanggal_jatuh_tempo' => Carbon::create('2018', '05', '20'),
            'total_bayar' => '500000',
            'uang_muka' => '350000',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
