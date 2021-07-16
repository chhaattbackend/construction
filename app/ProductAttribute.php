<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $fillable=[
        'id',
        'store_id',
        'product_id',
        'attribute_id',
        'desc',
    ];
    public function attribute(){
        return $this->belongsTo(Attribute::class,'attribute_id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function store(){
        return $this->belongsTo(Store::class,'store_id');
    }
    

}
