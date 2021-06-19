<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $fillable=[
        'id',
        'user_id',
        'name',
        'phone',
        'email',
        'longitude',
        'latitude',
        'image',
    ];
}
