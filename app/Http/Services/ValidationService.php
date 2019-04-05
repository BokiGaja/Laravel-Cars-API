<?php


namespace App\Http\Services;


use Illuminate\Support\Facades\Validator;


class ValidationService
{
    public static function validateCar($carData)
    {
        $validator = Validator::make($carData->all(), [
            'brand' => 'required|min:2',
            'model' => 'required|min:2',
            'year' => 'required',
            'maxSpeed' => 'integer|min:20|max:300',
            'isAutomatic' => 'required',
            'engine' => 'required',
            'numberOfDoors' => 'required|integer|min:2|max:5'
        ]);
        if ($validator->fails())
        {
            return $validator->messages()->first();
        }
        return $carData->all();
    }
}