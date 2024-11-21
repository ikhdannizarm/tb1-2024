<?php

// app/Models/Kursi.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursi extends Model
{
    use HasFactory;

    protected $table = 'kursi';
    protected $primaryKey = 'Id_Kursi';
    protected $fillable = ['Id_Jadwal', 'Nomor_Kursi', 'Status_Pemesanan'];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'Id_Jadwal');
    }

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'Id_Kursi');
    }
}
