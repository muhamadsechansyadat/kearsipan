<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArsipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsips', function (Blueprint $table) {
            $table->increments('id');
            //$table->datetime('tgl_buat_surat');
            $table->string('pengirim');
            $table->string('no_surat');
            $table->datetime('tgl_surat');
            $table->string('perihal');
            $table->string('lampiran');
            $table->integer('id_jenis');
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
        Schema::dropIfExists('arsips');
    }
}
