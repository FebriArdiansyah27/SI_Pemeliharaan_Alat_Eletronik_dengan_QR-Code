<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pemeliharaan', function (Blueprint $table) {
            $table->id(); // id sebagai primary key (auto-increment)
            $table->char('alat_id', 20);
            $table->date('tanggal');
            $table->text('uraian_pemeliharaan');
            $table->string('kondisi', 100);
            $table->timestamps();

            // Foreign Key ke tabel alats
            $table->foreign('alat_id')->references('alat_id')->on('alats')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemeliharaan');
    }
};
