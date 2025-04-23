<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use SoftDeletes;

    //
    public function products()
    {
        return $this->hasMany(Products::class);
    }

    protected $fillable = [
        'name',
        'slug',
        'visible',
    ];
}
