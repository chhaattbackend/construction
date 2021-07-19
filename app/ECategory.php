<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ECategory extends Model
{
    protected $fillable =[
        'id',
        'd_category_id',
        'name',
        'slug',

    ];
    public function category(){
        return $this->belongsTo(DCategory::class,'d_category_id');
    }
}
