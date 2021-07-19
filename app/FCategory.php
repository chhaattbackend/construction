<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FCategory extends Model
{
    protected $fillable =[
        'id',
        'e_category_id',
        'name',
        'slug',

    ];
    public function category(){
        return $this->belongsTo(ECategory::class,'e_category_id');
    }
}
