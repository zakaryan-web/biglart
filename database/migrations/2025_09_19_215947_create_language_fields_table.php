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
        Schema::create('language_fields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key')->nullable()->index('key');
            $table->string('description')->nullable();
            $table->text('default_value')->nullable();
            $table->timestamps();

            $table->unique(['key'], 'parent_id_and_key');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('language_fields');
    }
};
