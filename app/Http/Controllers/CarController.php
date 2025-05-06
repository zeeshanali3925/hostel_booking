<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('travel.car', compact('cars'));
    }

    public function show(Car $car)
    {
        return view('travel.car-detail', compact('car'));
    }

    public function book(Request $request, Car $car)
    {
        // yahan aap user ke data se booking record bana sakte ho
        // abhi sirf message dikha rahe hain

        return back()->with('success', 'Car booked successfully!');
    }
}
