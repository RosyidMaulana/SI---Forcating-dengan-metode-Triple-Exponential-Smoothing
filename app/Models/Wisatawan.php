<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Wisatawan extends Model
{
    protected $table =   'jumlah_wisatawan';

    protected $primaryKey = 'id_data';

    protected $fillable = [
        'jumlah_kunjungan',
        'bulan',
        'tahun'
    ];

    public $timestamps = false; // Menonaktifkan timestamps
}
