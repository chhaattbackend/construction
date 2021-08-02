<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserService extends Model
{   protected $fillable=[
    'id',
    'user_id',
    'service_id',
    'store_price',
    'qty',
    'status',
    'unit_id',
    'area_one_id',
    'area_two_id',
    'area_three_id',
];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function service(){
        return $this->belongsTo(Service::class,'service_id');
    }
    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id');
    }
    public function areaOne()
    {
        return $this->belongsTo(AreaOne::class, 'area_one_id');
    }
    public function areaTwo()
    {
        return $this->belongsTo(AreaTwo::class, 'area_two_id');
    }
    public function areaThree()
    {
        return $this->belongsTo(AreaThree::class, 'area_three_id');
    }

}
