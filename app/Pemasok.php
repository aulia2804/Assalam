<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    protected $table = 'pemasok';
    protected $primaryKey = 'id_pemasok';
    protected $fillable=['nama_pemasok','kontak_pemasok','alamat_pemasok'];
}
