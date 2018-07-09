<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTujuansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tujuans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_pengirim');
            $table->string('alamat_pengirim');
            $table->string('no_hp_pengirim');
            $table->string('barang');
            $table->double('berat');
            $table->string('nama_penerima');
            $table->string('alamat_penerima');
            $table->string('no_hp_penerima');
            $table->double('longitude');
            $table->double('latitude');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tujuans');
    }
}
