<?php

namespace App\Models;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use SoftDeletes;
    //

    public function brands()
    {
        return $this->belongsTo(Brands::class);
    }

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function product_images()
    {
        return $this->hasMany(ProductImages::class);
    }

    public function product_variants()
    {
        return $this->hasMany(ProductVariants::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    protected $fillable = [
        'name',
        'slug',
        'image',
        'price',
        'original_price',
        'discount_percentage',
        'label',
        'rating',
        'rating_count',
        'status',
        'description',
        'sku',
        'stock_quantity',
        'stock_status',
        'category_id',
        'category_type',
    ];
}
