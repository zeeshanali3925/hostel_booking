<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarBooking;

class CarBookingController extends Controller
{
    public function book(Request $request, $name)
    {


        $request->validate([
            'from_city' => 'required|string',
            'to_city' => 'required|string',
            'booking_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:booking_date',


        ]);
        
        $extraRent = 0;
        if ($request->from_city !== $request->to_city) {
            $extraRent = 5000;
        }

        $days = max(1, now()->parse($request->booking_date)->diffInDays(now()->parse($request->return_date)));

        $car = $this->getCarDetails($name);

        if (!$car) {
            return back()->with('error', 'Car not found!');
        }

        $totalPrice = ($car['price_per_day'] * $days) + $extraRent;

        CarBooking::create([
            'car_name' => $car['name'],
            'brand' => $car['brand'],
            'seats' => $car['seats'],
            'fuel' => $car['fuel'],
            'model_year' => $car['year'],
            'price_per_day' => $car['price_per_day'],
            'from_city' => $request->from_city,
            'to_city' => $request->to_city,
            'booking_date' => $request->booking_date,
            'return_date' => $request->return_date,
            'estimated_rent' => $extraRent,
            'total_days' => $days,
            'total_price' => $totalPrice,
        ]);

        return back()->with('success', 'Booking successful!');

    }

    private function getCarDetails($name)

    {
        $cars = [
            [
                'name' => 'Honda City 1.5L Aspire',
                'brand' => 'Honda',
                'seats' => 5,
                'fuel' => 'Petrol',
                'year' => 2022,
                'price_per_day' => 4500,
            ],
            [
                'name' => 'Honda Civic Oriel',
                'brand' => 'Honda',
                'seats' => 5,
                'fuel' => 'Petrol',
                'year' => 2023,
                'price_per_day' => 6000,
            ],
            [
                'name' => 'Hyundai Tucson GLS',
                'brand' => 'Hyundai',
                'seats' => 5,
                'fuel' => 'Petrol',
                'year' => 2023,
                'price_per_day' => 6400,
            ],
            [
                'name' => 'KIA Sportage AWD',
                'brand' => 'KIA',
                'seats' => 5,
                'fuel' => 'Petrol',
                'year' => 2024,
                'price_per_day' => 6500,
            ],
            [
                'name' => 'MG HS Exclusive',
                'brand' => 'MG Motors',
                'seats' => 5,
                'fuel' => 'Petrol',
                'year' => 2024,
                'price_per_day' => 7000,
            ],
            [
                'name' => 'Nissan Dayz',
                'brand' => 'Nissan',
                'seats' => 4,
                'fuel' => 'Petrol',
                'year' => 2019,
                'price_per_day' => 2500,
            ],
            [
                'name' => 'Suzuki Cultus VXL',
                'brand' => 'Suzuki',
                'seats' => 4,
                'fuel' => 'Petrol',
                'year' => 2021,
                'price_per_day' => 3200,
            ],
            [
                'name' => 'Suzuki Wagon R VXL',
                'brand' => 'Suzuki',
                'seats' => 4,
                'fuel' => 'Petrol',
                'year' => 2020,
                'price_per_day' => 2800,
            ],
            [
                'name' => 'Toyota Corolla Altis',
                'brand' => 'Toyota',
                'seats' => 5,
                'fuel' => 'Petrol',
                'year' => 2023,
                'price_per_day' => 5000,
            ],
            [
                'name' => 'Toyota Fortuner Sigma',
                'brand' => 'Toyota',
                'seats' => 7,
                'fuel' => 'Diesel',
                'year' => 2024,
                'price_per_day' => 8500,
            ],
        ];
        

        return collect($cars)->firstWhere('name', $name);
    }

} 