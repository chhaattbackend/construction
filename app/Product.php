<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'id',
        'a_category_id',
        'b_category_id',
        'c_category_id',
        'd_category_id',
        'e_category_id',
        'f_category_id',
        'brand_id',
        'name',
        'description',
        'price',
        'quantity',
        'thumbnail',
        'image',
        'unit_id',
        'slug',

    ];

    public function a_category(){
        return $this->belongsTo(ACategory::class,'a_category_id');
    }
    public function b_category(){
        return $this->belongsTo(BCategory::class,'b_category_id');
    }
    public function c_category(){
        return $this->belongsTo(CCategory::class,'c_category_id');
    }
    public function d_category(){
        return $this->belongsTo(DCategory::class,'d_category_id');
    }
    public function e_category(){
        return $this->belongsTo(ECategory::class,'e_category_id');
    }
    public function f_category(){
        return $this->belongsTo(FCategory::class,'f_category_id');
    }
    public function attributes(){
        return $this->hasMany(ProductAttribute::class,'product_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id');
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

}
