<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CCategory extends Model
{
    protected $fillable =[
        'id',
        'b_category_id',
        'name'
    ];
    public function category(){
        return $this->belongsTo(BCategory::class,'b_category_id');
    }
}
