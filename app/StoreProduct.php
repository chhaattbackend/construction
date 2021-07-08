<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreProduct extends Model
{
    protected $fillable =[
        'id',
        'store_id',
        'product_id',
        'store_price',
        'qty',
        'status',
        'brand_id',
        'unit_id',
    ];

    public function store(){
        return $this->belongsTo(Store::class,'store_id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function attributes(){
        return $this->belongsTo(Attribute::class,'attribute_id');
    }
    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id');
    }
}
