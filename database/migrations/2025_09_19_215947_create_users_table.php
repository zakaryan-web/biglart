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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->nullable()->unique();
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('phone')->nullable()->unique();
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->string('language', 4)->nullable();
            $table->integer('is_admin')->default(0)->index();
            $table->integer('is_ban')->default(0)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
