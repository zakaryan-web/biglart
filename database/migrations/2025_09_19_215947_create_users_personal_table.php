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
        Schema::create('users_personal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->default(0)->unique('users_personal_pk');
            $table->string('avatar')->nullable();
            $table->string('nick_name', 50)->nullable();
            $table->string('first_name', 50)->nullable();
            $table->string('last_name', 50)->nullable();
            $table->string('middle_name', 50)->nullable();
            $table->timestamp('age')->nullable();
            $table->text('about')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_personal');
    }
};
