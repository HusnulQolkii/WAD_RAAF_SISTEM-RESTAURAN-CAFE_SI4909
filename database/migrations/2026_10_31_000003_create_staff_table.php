<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 150);
            $table->enum('jabatan', ['Chef', 'Waiter', 'Kasir', 'Manajer', 'Lainnya']);
            $table->string('no_kontak', 30);
            $table->date('tanggal_bergabung');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
