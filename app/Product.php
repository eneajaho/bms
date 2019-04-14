<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'category_id',
        'product_price',
        'product_qty',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
