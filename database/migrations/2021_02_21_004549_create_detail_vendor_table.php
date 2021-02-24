<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailVendorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_vendor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_id');
            $table->string('penjualan_id',255);
            $table->string('totalBiaya', 45);
            $table->timestamps();
            
            $table->foreign('vendor_id')->references('id')->on('vendor')->onDelete('cascade');
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
        Schema::dropIfExists('detail_vendor');
    }
}
