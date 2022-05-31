<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'image'
    ];

    public function products_categories()
    {
        return $this->hasMany(ProductCategory::class, 'product_id');
    }

    public function cart_items()
    {
        return $this->hasMany(CartItem::class, 'product_id');
    }
}
