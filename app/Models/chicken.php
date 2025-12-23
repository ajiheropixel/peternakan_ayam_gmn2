<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chicken extends Model
{
    public $timestamps = false;

    // Pastikan nama kolom di sini SAMA dengan di phpMyAdmin
    protected $fillable = [
        'nama_kandang', 
        'jenis_ayam', 
        'jumlah_ekor' // Sesuaikan dari 'jumlah' menjadi 'jumlah_ekor'
    ];
}