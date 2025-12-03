<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

//     items
// - id (ULID or UUID)
// - product_id FK
// - room_id FK nullable
// - code (unique)                  // INV-ELK-0001
// - serial_number (nullable)
// - item_photo (nullable)          // FOTO PER ITEM
// - condition (enum: Baik, Rusak_Ringan, Rusak_Berat, Hilang)
// - status (enum: Tersedia, Dipinjam, Dipindah)
// - warranty_until (nullable)
// - qr_path (nullable)
// - acquired_at (nullable)
// - note (nullable)
// - created_by FK
// - updated_by FK
// - deleted_at (soft delete)
// - timestamps

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('product_id')->constrained();
            $table->foreignUlid('room_id')->nullable()->constrained();
            $table->string('code')->unique();
            $table->string('serial_number')->nullable();
            $table->string('item_photo')->nullable();
            $table->enum('condition', ['Baik', 'Rusak_Ringan', 'Rusak_Berat', 'Hilang']);
            $table->enum('status', ['Tersedia', 'Dipinjam', 'Dipindah']);
            $table->date('warranty_until')->nullable();
            $table->string('qr_path')->nullable();
            $table->date('acquired_at')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('items');
    }
};
