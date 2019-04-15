<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'table_id',
        'user_id',
        'completed'
    ];

    public function orderDetails(){
        return $this->hasMany(OrderDetails::class);
    }
    public function table(){
        return $this->belongsTo(Table::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}
