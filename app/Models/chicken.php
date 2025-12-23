<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class Chicken extends Model
{
    protected $fillable = ['kode_kandang', 'jenis_ayam', 'jumlah_ekor', 'tanggal_masuk'];
}