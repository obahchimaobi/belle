<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    //
    public function products()
    {
        return $this->belongsTo(Products::class);
    }

    protected $fillable = [
        'product_id',
        'image_path',
    ];
}
