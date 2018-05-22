<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PenggunaSeeder::class);
        $this->call(PelangganSeeder::class);
        $this->call(PemasokSeeder::class);
        $this->call(SatuanSeeder::class);
        $this->call(BarangSeeder::class);
        $this->call(PembelianSeeder::class);
        $this->call(DepemSeeder::class);
        $this->call(HutangSeeder::class);
        $this->call(ReturSeeder::class);
        $this->call(DeretSeeder::class);
        $this->call(PenjualanSeeder::class);
        $this->call(DepenSeeder::class);
        $this->call(PiutangSeeder::class);
    }
}
