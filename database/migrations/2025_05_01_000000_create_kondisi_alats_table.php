<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKondisiAlatsTable extends Migration
{
    public function up()
    {
        Schema::create('kondisi_alats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kondisi')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kondisi_alats');
    }
}
