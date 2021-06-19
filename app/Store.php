<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable =[
        'id',
        'user_id',
        'city_id',
        'name',
        'email',
        'phone',
        'mobile',
        'address',
        'status',
        'nic',
        'ntn',
        'open_timing',
        'close_timing',
        'image',
        'thumbnail',
        'featured',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class,'store_id');
    }

    // public function storeproducts(){
    //     return $this->belongsToMany(Product::class,'store_products','store_id','product_id');
    // }

    public function storeproducts(){
        return $this->hasMany(StoreProduct::class,'store_id');
    }

    public function storeservices(){
        return $this->hasMany(StoreService::class,'store_id');
    }
}
