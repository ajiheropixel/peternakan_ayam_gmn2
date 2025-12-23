<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Matikan timestamps karena tabel di database tidak memilikinya
    public $timestamps = false;

    protected $fillable = [
        'user_id', 
        'product_id', 
        'jumlah', 
        'total_harga', 
        'status'
    ];

    // Hubungan ke User (Memperbaiki error RelationNotFound)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Hubungan ke Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}