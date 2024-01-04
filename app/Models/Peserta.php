<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    protected $table = 'pesertas';
    protected $guarded = [];

    public function nilaiSoftskills()
    {
        return $this->hasMany(NilaiPeserta::class);
    }
}
