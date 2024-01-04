<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiPeserta extends Model
{
    protected $table = 'nilai_pesertas';

    protected $fillable = ['peserta_id', 
     'fasilitator_id', 'nilai_akhir', 'presensi', 
    'total_nilai', 'konversi_nilai', 'tahun', 'level'];


public function fasilitator()
{
    return $this->belongsTo(Fasilitator::class, 'fasilitator_id');
}

public function peserta()
{
    return $this->belongsTo(Peserta::class, 'peserta_id');
}
}
