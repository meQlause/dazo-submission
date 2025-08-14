<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); 
            $table->string('nama_produk', 255);
            $table->foreignId('kategori_id')->constrained('categories')->onDelete('cascade');
            $table->string('sku', 100);
            $table->boolean('stok_produk')->default(true);
            $table->integer('stok')->default(0);
            $table->decimal('harga_modal', 15, 2)->default(0);
            $table->decimal('harga_jual', 15, 2)->default(0);
            $table->decimal('harga_spesial', 15, 2)->nullable();
            $table->string('image')->nullable();
            $table->integer('variants')->default(1);
            $table->string('type', 100)->default('Fisik');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
