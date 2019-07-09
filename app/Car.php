<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = ['id'];

    const STORE_RULES = [
        'brand' => 'required | string',
        'model' => 'required | string',
        'year' => 'required|date',
        'maxSpeed' => 'required|integer|between:1,500',
        'isAutomatic' => 'required|boolean',
        'engine' => 'required | string',
        'numberOfDoors' => 'required | integer | between:1,8'
    ];
}
