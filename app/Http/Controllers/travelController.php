<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class travelController extends Controller
{
    public function flights()
    {
        return view('travel.flights');
    }

   
    public function car()
    {
        return view('travel.car');
    }

    public function car_booking()
    {
        return view('travel.car_booking');
    }



    
    public function cruisis()
    {
        return view('travel.cruisis');
    }
    



    public function things()
    {
        return view('things'); // make sure you have a 'things.blade.php' file in resources/views
    }
    






















    
}
