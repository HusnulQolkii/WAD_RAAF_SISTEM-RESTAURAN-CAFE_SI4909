<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('supplier', function (Blueprint $table) {
            $table->id();
            $table->string('nama_supplier', 150);
            $table->text('alamat');
            $table->string('no_kontak', 30);
            $table->enum('jenis_pasokan', ['Segar', 'Kering', 'Segar dan Kering']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('supplier');
    }
};
