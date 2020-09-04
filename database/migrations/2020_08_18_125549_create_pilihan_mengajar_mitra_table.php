<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePilihanMengajarMitraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilihan_mengajar_mitra', function (Blueprint $table) {
            $table->id();
            $table->integer('mitra_id');
            $table->integer('jenjang_id');
            $table->integer('kurikulum_id');
            $table->integer('mapel_id');
            $table->timestamps();

            $table->foreign('mitra_id')->references('id')->on('mitra')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pilihan_mengajar_mitra');
    }
}
