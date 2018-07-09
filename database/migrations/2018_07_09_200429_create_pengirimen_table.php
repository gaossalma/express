<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePengirimenTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengirimen', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tujuan')->unsigned();
            $table->integer('id_kurir')->unsigned();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_tujuan')->references('id')->on('tujuans');
            $table->foreign('id_kurir')->references('id')->on('kurirs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pengirimen');
    }
}
