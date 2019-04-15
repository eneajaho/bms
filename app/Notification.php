<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'name',
        'description',
        'visible',
        'user_id',
        'type'

    ];
}
