<?php
namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Booking;
use Illuminate\Http\Request;

class FlightBookingController extends Controller
{
    public function store(Request $request, $id)
    {
        $flight = Flight::findOrFail($id);

        Booking::create([
            'user_id' => auth()->id(), // Assuming user is logged in
            'flight_id' => $flight->id,
            'price' => $flight->price,
            'status' => 'confirmed',
        ]);

        return redirect()->route('booking.success')->with('success', 'Flight booked successfully!');
    }
}
