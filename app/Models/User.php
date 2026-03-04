<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role', 'alamat', 'no_hp'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // --- TAMBAHKAN KODE DI BAWAH INI ---

    /**
     * Relasi ke model Laporan (Satu user bisa punya banyak laporan)
     */
    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }

    /**
     * Cek apakah user adalah warga
     */
    public function isWarga()
    {
        return $this->role === 'warga';
    }

    /**
     * Cek apakah user adalah petugas
     */
    public function isPetugas()
    {
        return $this->role === 'petugas';
    }
}