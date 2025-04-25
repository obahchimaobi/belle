<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use SoftDeletes;
    
    //
    protected $fillable = [
        'users_id',
        'session_id',
        'products_id',
        'product_image',
        'color',
        'size',
        'quantity',
        'price',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsTo(Products::class);
    }
}
