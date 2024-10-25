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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->uuid('kd_transaksis')->primary(); 
            $table->uuid('kd_pelanggans');
            $table->uuid('kd_barangs');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Menambahkan foreign key
            $table->datetime('tgl_transaksi');
            $table->float('berat', 8, 2);
            $table->decimal('total_bayar', 15, 2);
            $table->string('catatan')->nullable();
            $table->foreign('kd_pelanggans')->references('kd_pelanggans')->on('pelanggans')->onDelete('cascade');
            $table->foreign('kd_barangs')->references('kd_barangs')->on('barangs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
