<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $fillable=[
        'id',
        'user_id',
        'product_id',
        'store_id',
        'rating',
        'review',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function store(){
        return $this->belongsTo(Store::class,'store_id');
    }

}
