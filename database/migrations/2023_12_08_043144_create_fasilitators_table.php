<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFasilitatorsTable extends Migration
{
    public function up()
    {
        Schema::create('fasilitators', function (Blueprint $table) {
            $table->id();
            $table->string('NIDN')->nullable();
            $table->string('Nama_Lengkap')->default('');
            $table->string('Prodi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fasilitators');
    }
};
