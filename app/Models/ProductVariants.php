<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariants extends Model
{
    use SoftDeletes;

    //
    public function products()
    {
        return $this->belongsTo(Products::class);
    }

    protected $fillable = [
        'products_id',
        'size',
        'color_code',
        'color_name',
    ];
}
