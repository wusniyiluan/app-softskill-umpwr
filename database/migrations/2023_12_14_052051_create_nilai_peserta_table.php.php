<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiPesertaTable extends Migration
{
    public function up()
    {
        Schema::create('nilai_pesertas', function (Blueprint $table) {
            $table->id();
            //$table->string('nim');
            //$table->string('nama_peserta');
            $table->unsignedBigInteger('peserta_id');
            $table->unsignedBigInteger('fasilitator_id');
            $table->float('nilai_akhir');
            $table->integer('presensi');
            $table->float('total_nilai')->nullable();
            $table->string('konversi_nilai')->nullable();
            $table->string('tahun'); // Tambah kolom tahun
            $table->string('level'); // Tambah kolom level
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nilai_pesertas');
    }
}
