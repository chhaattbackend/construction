<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DCategory extends Model
{
    protected $fillable =[
        'id',
        'c_category_id',
        'name',
        'image',
        'slug',

    ];
    public function category(){
        return $this->belongsTo(CCategory::class,'c_category_id');
    }
}
