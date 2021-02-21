<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->string('noResi',255)->primary();
            $table->string('tanggal', 45);
            $table->string('hargaKg', 45);
            $table->string('kuli', 45);
            $table->string('penerima', 45);
            $table->string('alamatPenerima', 45);
            $table->string('noTelpPenerima', 45);
            $table->foreignId('vendor_id');
            $table->foreignId('barang_id');
            $table->foreignId('metodePembayaran_id');
            $table->foreignId('statusPengiriman_id');
            $table->foreignId('customer_id');
            $table->foreignId('destinasi_id');
            $table->timestamps();

            $table->foreign('vendor_id')->references('id')->on('vendor')->onDelete('cascade');
            $table->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade');
            $table->foreign('metodePembayaran_id')->references('id')->on('metode_pembayaran')->onDelete('cascade');
            $table->foreign('statusPengiriman_id')->references('id')->on('status_pengiriman')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('cascade');
            $table->foreign('destinasi_id')->references('id')->on('destinations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan');
    }
}
