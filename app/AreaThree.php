<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaThree extends Model
{
    protected $connection = 'mysql2';
    protected $fillable=['name','area_two_id','area_one_id','latitude','longitude'];
    protected $table='area_three';

    public function areaOne(){
        return $this->belongsTo(AreaOne::class,'area_one_id');
    }
    public function areaTwo(){
        return $this->belongsTo(AreaTwo::class,'area_two_id');
    }

    public function agencies(){
        return $this->hasMany(Agency::class,'area_three_id');
    }

    public function areaThree(){
        return $this->hasMany(AreaTwo::class,'area_three_id');
    }

    public function properties(){
        return $this->hasMany(Property::class,'area_three_id');
    }

    public function leads(){
        return $this->hasMany(Lead::class,'area_three_id');
    }

}
