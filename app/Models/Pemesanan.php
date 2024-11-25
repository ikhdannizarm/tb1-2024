<?php

// app/Models/Pemesanan.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'pemesanan';
    protected $primaryKey = 'Id_Pemesanan';
    protected $fillable = ['user_id', 'Id_Jadwal', 'Id_Kursi', 'Tanggal_Pemesanan', 'Total_Harga'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'Id_Jadwal');
    }

    public function kursi()
    {
        return $this->hasMany(Kursi::class, 'Id_Kursi');
    }
}
