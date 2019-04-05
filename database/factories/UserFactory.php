<?php

use Faker\Generator as Faker;

$factory->define(\App\Car::class, function (Faker $faker) {
    $faker = (new \Faker\Factory())::create();
    $faker->addProvider(new \Faker\Provider\Fakecar($faker));
    return [
        'brand' => $faker->vehicleBrand,
        'model' => $faker->vehicleModel,
        'year' => $faker->year($min = 1990, $max = 'now'),
        'maxSpeed' => $faker->numberBetween(100, 300),
        'isAutomatic' => $faker->boolean(50),
        'engine' => $faker->name,
        'numberOfDoors' => $faker->vehicleDoorCount
    ];
});