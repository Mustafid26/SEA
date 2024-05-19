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
        Schema::create('konten_materi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('materi_id');
            $table->text('konten');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('materi_id')->references('id')->on('materi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konten_materi');
    }
};