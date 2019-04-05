<?php

namespace App\Http\Controllers;

use App\Car;
use App\Http\Services\ValidationService;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Car::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = ValidationService::validateCar($request);
        if (gettype($validatedData) === 'string') {
            return $validatedData;
        }
        $newCar = new Car($validatedData);
        if ($newCar->save()) {
            return $newCar;
        }
        return null;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Car $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return $car;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Car $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $validatedData = ValidationService::validateCar($request);
        if (gettype($validatedData) === 'string') {
            return $validatedData;
        }
        $car->update($validatedData);
        return $car;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Car $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        if ($car->delete()) {
            return 'Car with id: ' . $car->id . ' has been deleted';
        }
        return null;
    }
}
