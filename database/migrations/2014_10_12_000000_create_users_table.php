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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik', 16)->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('kode_pos');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('no_telp');
            $table->string('kecamatan');
            $table->string('tempat_lahir');
            $table->string('kelurahan');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('status');
            $table->text('alamat');
            $table->string('profile_picture')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
