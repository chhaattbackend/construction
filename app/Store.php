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
        'area_one_id',
        'area_two_id',
        'area_three_id',
        'description',
        'address',
        'status',
        'nic',
        'ntn',
        'open_timing',
        'close_timing',
        'image',
        'slug',
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

    // public function userservices(){
    //     return $this->hasMany(StoreService::class,'user_id');
    // }
    public function areaOne()
    {
        return $this->belongsTo(AreaOne::class, 'area_one_id');
    }
    public function areaTwo()
    {
        return $this->belongsTo(AreaTwo::class, 'area_two_id');
    }
    public function areaThree()
    {
        return $this->belongsTo(AreaThree::class, 'area_three_id');
    }
}
