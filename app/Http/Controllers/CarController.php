<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->input('take') && !$request->input('skip')){
            return Car::all();
        }else{
            $cars = Car::all();
        }

        if($request->input('skip')){
            $cars = $this->skip($request->input('skip'), $cars);
        }
        if($request->input('take')){
            $cars = $this->take($request->input('take'), $cars);
        }


        return $cars;
    }

    public function take($number, $cars)
    {
        $newCars = [];
        for($i = 0; $i < $number; $i++){
            array_push($newCars, $cars[$i]);
        }

        return $newCars;
    }

    public function skip($number, $cars)
    {

        $newCars = [];
        for($i = $number-1; $i < $cars->count(); $i++){
            array_push($newCars, $cars[$i]);
        }


        return $newCars;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $car = new Car();

        $this->validate(request(), Car::STORE_RULES);


        $car->brand = $request->input('brand');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->maxSpeed = $request->input('maxSpeed');
        $car->isAutomatic = $request->input('isAutomatic');
        $car->engine = $request->input('engine');
        $car->numberOfDoors = $request->input('numberOfDoors');

        $car->save();

        return $car;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Car::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);

        $this->validate(request(), Car::STORE_RULES);
        if(!$car->maxSpeed){
            $car->maxSpeed = $request->input('maxSpeed');
        }else{
            $car->maxSpeed = 20;
        }

        $car->brand = $request->input('brand');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->isAutomatic = $request->input('isAutomatic');
        $car->engine = $request->input('engine');
        $car->numberOfDoors = $request->input('numberOfDoors');

        $car->save();

        return $car;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::findOrFail($id);

        $string = 'Car ' . $car->brand . ' ' . $car->model . ' was deleted';

        $car->delete();

        return $string;
    }
}
