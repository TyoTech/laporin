<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';

    protected $fillable = [
        'user_id', 'judul', 'kategori', 'deskripsi', 'foto', 'status', 'catatan_petugas'
    ];

    protected $casts = [
        'foto' => 'array', // auto convert JSON <-> array
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}