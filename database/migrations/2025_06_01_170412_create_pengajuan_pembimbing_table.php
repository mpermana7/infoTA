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
        Schema::create('pengajuan_pembimbing', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->bigInteger('nim');
            $table->string('nama');
            $table->string('dosen');
            $table->string('kode_dosen');
            $table->string('posisi');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_pembimbing');
    }
};
