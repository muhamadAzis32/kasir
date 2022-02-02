<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bayar');
            $table->integer('jumlah');
            $table->integer('total');
            $table->unsignedBigInteger('produk_id');
            $table->foreign('produk_id')->references('id')->on('produk');
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('member');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
        
    }
}
