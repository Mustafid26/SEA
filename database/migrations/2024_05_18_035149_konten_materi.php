<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('konten_materi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('materi_id')->constrained('materi')->onDelete('cascade');
            $table->string('pdf_path');
            $table->string('name');
            $table->text('desc');
            $table->timestamps();

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