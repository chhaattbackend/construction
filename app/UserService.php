<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserService extends Model
{
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function service(){
        return $this->belongsTo(Service::class,'service_id');
    }
    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id');
    }
    protected $fillable=[
        'id',
        'user_id',
        'service_id',
        'store_price',
        'qty',
        'status',
        'unit_id',
    ];
}
