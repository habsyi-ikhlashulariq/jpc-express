<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusPengirimanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_pengiriman', function (Blueprint $table) {
            $table->id();
            $table->string('penjualan_id',255);
            $table->string('platNomor', 45);
            $table->string('namaSupir', 45);
            $table->string('keterangan', 45);
            $table->string('tanggal', 45);
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('penjualan_id')->references('noResi')->on('penjualan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_pengiriman');
    }
}
