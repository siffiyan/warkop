<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiayaLesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biaya_les', function (Blueprint $table) {
            $table->id();
            $table->integer('jenjang_id');
            $table->bigInteger('kurikulum_id');
            $table->bigInteger('harga_tambahan_per_1');
            $table->integer('harga_90');
            $table->integer('harga_120');
            $table->integer('admin_id');
            $table->timestamps();

            $table->foreign('admin_id')->references('id')->on('admin')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biaya_les');
    }
}
