<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariants extends Model
{
    //
    public function products()
    {
        return $this->belongsTo(Products::class);
    }

    protected $fillable = [
        'product_id',
        'size',
        'color_code',
        'color_name',
    ];
}
