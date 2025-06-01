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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable();
            $table->bigInteger('nim')->unique();
            $table->string('nama');
            $table->string('kelas')->nullable();
            $table->string('program_studi')->nullable();
            $table->string('fakultas')->nullable();
            $table->year('angkatan')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('no_hp')->nullable()->unique();
            $table->string('nama_pengguna')->unique();
            $table->string('kata_sandi');
            $table->string('role')->default('mahasiswa');
            $table->integer('nilai')->nullable();
            $table->integer('wajib_ganti_kata_sandi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
