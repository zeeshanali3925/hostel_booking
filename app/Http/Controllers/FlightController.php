<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FlightBooking;
class FlightController extends Controller
{
    public function index()
    {
        return view('travel.flights'); // flights.blade.php ko render karega
    }
  
    public function store(Request $request, $name)
    {
        $validated = $request->validate([
            'trip_type' => 'required',
            'departure_date' => 'required|date',
            'return_date' => 'nullable|date',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
            'infants' => 'nullable|integer|min:0',
            'travel_class' => 'required',
            'special_request' => 'nullable|string',
            'agree' => 'required|accepted',
        ]);
    
        FlightBooking::create([
            'flight_name' => $name,
            'trip_type' => $validated['trip_type'],
            'departure_date' => $validated['departure_date'],
            'return_date' => $validated['return_date'],
            'adults' => $validated['adults'],
            'children' => $validated['children'],
            'infants' => $validated['infants'],
            'travel_class' => $validated['travel_class'],
            'special_request' => $validated['special_request'],
            'agree' => true,
        ]);
    
        return redirect()->back()->with('success', 'Flight booked successfully!');
    }
    


}
