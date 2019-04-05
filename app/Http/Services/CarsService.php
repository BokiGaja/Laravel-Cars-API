<?php


namespace App\Http\Services;


use App\Car;

class CarsService
{
    public static function paginate($carsData)
    {
        return Car::skip($carsData->skip)->take($carsData->take)->get();
    }
}