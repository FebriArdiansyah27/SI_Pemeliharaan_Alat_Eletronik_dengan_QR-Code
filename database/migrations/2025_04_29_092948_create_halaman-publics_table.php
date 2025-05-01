<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHalamanPublicsTable extends Migration
{
    public function up()
    {
        Schema::create('halaman_publics', function (Blueprint $table) {
            $table->id('halaman_id');
            $table->char('alat_id', 20);  // Pastikan tipe alat_id sesuai dengan tabel 'alats'
            $table->string('url_qrcode', 225);
            $table->text('qr_code')->nullable();
            $table->timestamps();

            // Foreign key untuk alat_id
            $table->foreign('alat_id')->references('alat_id')->on('alats')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('halaman_publics');
    }
}
