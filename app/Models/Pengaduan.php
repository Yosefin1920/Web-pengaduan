<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduan';

    protected $fillable = [
        'user_id',
        'kategori',
        'lokasi',
        'nama_pelapor',
        'no_telp',
        'judul_aduan',
        'tanggal',
        'deskripsi',
        'foto',
        'tampilkan_nama',
        'saran',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
