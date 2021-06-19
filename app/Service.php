<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Service extends Model
{
    public function category(){
        return $this->belongsTo(ServiceType::class,'service_type_id');
    }
    protected $fillable =[
        'id',
        'service_type_id',
        'name',
        'description',
        'price',
        'image',
        'thumbnail',
        'unit_id',
    ];
}
