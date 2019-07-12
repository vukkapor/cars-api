<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\Car;

$factory->define(Car::class, function (Faker $faker) {
    return [
        'brand' => $faker->randomElement($array = array('BMW', 'Mercedes', 'Toyota', 'Hyundai')),
        'model' => $faker->word,
        'year' => $faker->numberBetween($mix = 1950, $max = 2019),
        'maxSpeed' => $faker->numberBetween($min = 60, $max = 300),
        'isAutomatic' => $faker->boolean($chanceOfGettingTrue = 50),
        'engine' => $faker->randomElement($array = array('diesel', 'petrol', 'electric', 'hybrid')),
        'numberOfDoors' => $faker->randomElement($array = array(3, 5, 7))
    ];
});
