<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_complains', function (Blueprint $table) {
            $table->id();
            $table->string('kode_booking');
            $table->unsignedBigInteger('kategori_id');
            $table->string('name');
            $table->string('phone');
            $table->text('deskripsi');
            $table->enum('status', ['Baru', 'Proses', 'Selesai'])->default('Baru');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_complains');
    }
};
