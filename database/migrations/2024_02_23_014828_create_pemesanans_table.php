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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tanggal_pemesanan');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('nama_pemesanan');
            $table->string('jumlah_pelanggan');
            $table->timestamps('created_at')->default(DB::row('CURRENT_TIMESTAMP'));
            $table->timestamps('updated_at')->default(DB::row('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};
