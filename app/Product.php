<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'category_id',
        'price',
        'unit',
        'barcode',
        'quantity',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
