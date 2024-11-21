<?php

// app/Models/Jadwal.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';
    protected $primaryKey = 'Id_Jadwal';
    protected $fillable = ['Waktu_Pemberangkatan', 'Waktu_Tiba', 'Kursi_Tersedia'];

    public function kursi()
    {
        return $this->hasMany(Kursi::class, 'Id_Jadwal');
    }

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'Id_Jadwal');
    }
}
