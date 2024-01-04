<?php
// Fungsi Model : digunakan untuk berinteraksi dengan tabel dalam basis data pada database
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitator extends Model
{
    use HasFactory;

    protected $table = 'fasilitators'; //Menetapkan nama tabel basis data yang akan digunakan oleh model ini
    protected $fillable = ['NIDN', 'Nama_Lengkap', 'Prodi']; // Kolom-kolom yang dapat diisi secara massal (mass assignable) pada saat create

    public function nilaiSoftskills()
    {
        return $this->hasMany(NilaiPeserta::class);
    }
    
}
