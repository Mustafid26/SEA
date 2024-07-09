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
        Schema::create('Kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelas');
            $table->text('detail_kelas');
            $table->string('rombel')->nullable();
            $table->text('deskripsi');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Kelas');
    }
};
