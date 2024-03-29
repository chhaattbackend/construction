<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaTwo extends Model
{
    protected $connection = 'mysql2';
    protected $fillable = ['name', 'area_one_id', 'latitude', 'longitude', 'latlong'];
    protected $table = 'area_two';

    public function areaOne()
    {
        return $this->belongsTo(AreaOne::class, 'area_one_id');
    }
    public function agencies()
    {
        return $this->hasMany(Agency::class, 'area_two_id')->limit(10);
    }

    public function areaThree()
    {
        return $this->hasMany(AreaThree::class, 'area_two_id');
    }


    public function properties()
    {
        return $this->hasMany(Property::class, 'area_two_id');
    }

    public function leads()
    {
        return $this->hasMany(Lead::class, 'area_two_id');
    }
}
