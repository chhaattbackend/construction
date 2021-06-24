<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BCategory extends Model
{
    protected $fillable =[
        'id',
        'a_category_id',
        'name'
    ];
    public function category(){
        return $this->belongsTo(ACategory::class,'a_category_id');
    }

    public function subcategories(){
        return $this->hasMany('App\CCategory', 'b_category_id','id');
    }
}
