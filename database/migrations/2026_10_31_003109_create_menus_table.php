<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
        public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')
                ->constrained('categories')
                ->restrictOnDelete();

            $table->string('nama_menu', 150);
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 12, 2);
            $table->boolean('status_halal')->default(false);
            $table->text('informasi_alergen')->nullable();
            $table->string('foto')->nullable();

            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
