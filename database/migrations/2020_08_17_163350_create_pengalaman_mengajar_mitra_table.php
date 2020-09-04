<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengalamanMengajarMitraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengalaman_mengajar_mitra', function (Blueprint $table) {
            $table->id();
            $table->integer('mitra_id');
            $table->string('nama_sekolah');
            $table->string('tahun_awal');
            $table->string('tahun_akhir');

            $table->foreign('mitra_id')->references('id')->on('mitra')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengalaman_mengajar_mitra');
    }
}
