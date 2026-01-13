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
        Schema::create('language_string', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('language', 4)->nullable()->index('language');
            $table->bigInteger('field_id')->nullable()->index('field_id');
            $table->text('value')->nullable();
            $table->timestamps();

            $table->unique(['language', 'field_id'], 'language_field');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('language_string');
    }
};
