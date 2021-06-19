<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $fillable=[
        'id',
        'product_id',
        'overview',
        'description',
        'specification',
    ];
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
