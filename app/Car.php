<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = ['id'];

    const STORE_RULES = [
        'brand' => 'required | string | min:2',
        'model' => 'required | string | min:2',
        'year' => 'required|date',
        'maxSpeed' => 'integer|between:20,300',
        'isAutomatic' => 'required|boolean',
        'engine' => 'required | string',
        'numberOfDoors' => 'required | integer | between:2,5'
    ];
}
