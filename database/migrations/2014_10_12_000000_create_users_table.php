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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique();
            $table->string('username')->unique();
            $table->string('name');
            $table->string('password');
            $table->string('super_user')->nullable();
            $table->string('organization')->nullable();
            $table->string('grup')->nullable();
            $table->string('position')->nullable();
            $table->string('email')->unique();
            $table->string('contact')->nullable();
            $table->string('information')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
