<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ACategory extends Model
{
    protected $fillable=[
        'id',
        'name',
        'image'
    ];

    // public function subcategories(){
    //     return $this->hasMany('App\BCategory', 'a_category_id','id');
    // }
    




}




