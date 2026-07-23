<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 255)->unique();
            $table->text('description')->nullable();
            $table->string('developer', 255)->nullable();
            $table->string('publisher', 255)->nullable();
            $table->date('release_date')->nullable();
            $table->json('in_game_value_unit');
            $table->string('potrait_image_attachment')->nullable();
            $table->string('landscape_image_attachment')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
