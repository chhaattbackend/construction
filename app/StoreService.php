<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreService extends Model
{
    public function store(){
        return $this->belongsTo(Store::class,'store_id');
    }
    public function service(){
        return $this->belongsTo(Service::class,'service_id');
    }
    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id');
    }
    protected $fillable=[
        'id',
        'store_id',
        'service_id',
        'store_price',
        'qty',
        'status',
        'unit_id',
    ];
}
