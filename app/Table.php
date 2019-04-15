<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $fillable = [
        'table_name',
        'table_size',
        'free',
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
