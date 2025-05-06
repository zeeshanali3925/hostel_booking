<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlightBooking extends Model
{
    //


    protected $fillable = [
        'flight_name',
        'trip_type',
        'departure_date',
        'return_date',
        'adults',
        'children',
        'infants',
        'travel_class',
        'special_request',
        'agree',
    ];
    
}
