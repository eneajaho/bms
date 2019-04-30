<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category_name',
        'logo',
        'color',
    ];

   public function products(){
       return $this->hasMany(Product::class);
   }
}
