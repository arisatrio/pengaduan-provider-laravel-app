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
        Schema::create('t_complain_replies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('t_complain_id');
            $table->text('reply');
            $table->unsignedBigInteger('reply_by');
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
        Schema::dropIfExists('t_complain_replies');
    }
};
