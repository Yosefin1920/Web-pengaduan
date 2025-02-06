<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('komentars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengaduan_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('isi_komentar');
            $table->boolean('is_anonymous')->default(false);
            $table->timestamps();

            $table->foreign('pengaduan_id')->references('id')->on('pengaduan')->nullOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('komentars');
    }
};
