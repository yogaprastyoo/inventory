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
        Schema::create('products', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('category_id')->constrained();
            $table->foreignUlid('brand_id')->constrained();
            $table->foreignUlid('funding_source_id')->constrained();
            $table->string('name', 150);
            $table->year('year');
            $table->bigInteger('price');
            $table->integer('quantity');
            $table->string('photo')->nullable();
            $table->string('description', 255)->nullable();
            $table->foreignUlid('created_by')->constrained('users');
            $table->foreignUlid('updated_by')->constrained('users');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
