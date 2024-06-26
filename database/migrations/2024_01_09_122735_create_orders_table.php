<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("order_id");
            $table->foreignId("users_id");
            $table->foreignId("product_id");
            $table->integer("jumlah");
            $table->string("bukti_pembayaran")->nullable();
            //$table->string("keterangan")->nullable();
            $table->string("Alamat_Pengiriman")->nullable();
            $table->enum("status", ["pending","cancel", "success"])->default("pending");
            $table->string("Alasan_cancel")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
