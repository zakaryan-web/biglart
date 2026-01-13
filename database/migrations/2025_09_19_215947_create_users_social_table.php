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
        Schema::create('users_social', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->default(0)->unique('users_social_pk');
            $table->string('vk_id')->nullable()->unique('users_social_pk_2');
            $table->string('tg_id')->nullable()->unique('users_social_pk_3');
            $table->string('google_id')->nullable()->unique('users_social_pk_4');
            $table->string('yandex_id')->nullable()->unique('users_social_pk_5');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable()->useCurrent();

            $table->index(['user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_social');
    }
};
