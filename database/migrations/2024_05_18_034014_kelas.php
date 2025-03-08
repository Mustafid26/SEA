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
            $table->uuid('id')->primary();
            $table->uuid('rombel_id');
            $table->string('nama_kelas');
            $table->text('detail_kelas');
            $table->text('deskripsi');
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('rombel_id')->references('id')->on('rombels')->onDelete('cascade');
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