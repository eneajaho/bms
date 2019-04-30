<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'category_id',
        'buying_price_per_unit',
        'quantity',
        'selling_price_per_unit',
        'barcode',
        'tax',
        'unit',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
