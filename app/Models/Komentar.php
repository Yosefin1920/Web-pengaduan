<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $fillable = ['pengaduan_id', 'user_id', 'isi_komentar', 'is_anonymous',];
    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class, 'pengaduan_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
