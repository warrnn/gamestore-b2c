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
        Schema::create('game_vouchers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->string('reedem_code', 255)->unique();
            $table->integer('value');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_vouchers');
    }
};
