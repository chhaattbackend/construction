<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $fillable =[
        'id',
        'country_id',
        'name'
    ];
    public function country(){
        return $this->belongsTo(Country::class,'country_id');
    }
}
