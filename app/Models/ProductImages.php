<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImages extends Model
{
    use SoftDeletes;

    //
    public function products()
    {
        return $this->belongsTo(Products::class);
    }

    protected $fillable = [
        'products_id',
        'image_path',
        'visible',
    ];
}
