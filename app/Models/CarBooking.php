<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_name',
        'brand',
        'seats',
        'fuel',
        'model_year',
        'price_per_day',
        'from_city',
        'to_city',
        'booking_date',
        'return_date',
        'estimated_rent',
        'total_days',
        'total_price',
    ];
}



