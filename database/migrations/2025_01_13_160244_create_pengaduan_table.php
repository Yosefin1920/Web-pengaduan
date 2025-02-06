<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('kategori');
            $table->string('lokasi');
            $table->string('nama_pelapor');
            $table->string('no_telp');
            $table->string('judul_aduan');
            $table->date('tanggal');
            $table->text('deskripsi');
            $table->text('saran');
            $table->enum('status', ['Diajukan', 'Proses', 'Selesai'])->default('Diajukan');
            $table->string('foto')->nullable();
            $table->enum('tampilkan_nama', ['Publik', 'Anonim'])->default('Publik');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};
