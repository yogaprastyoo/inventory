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
        Schema::create('item_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignUlid('item_id')->constrained('items');
            $table->foreignUlid('user_id')->constrained('users');
            $table->string('action');
            $table->json('old_value')->nullable();
            $table->json('new_value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_logs');
    }
};
