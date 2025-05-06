<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stay;  // Assuming you have a Stay model for storing stays

class travelstaysController extends Controller
{
    public function stays()
    {
        
        $stays = Stay::all(); // Using Eloquent Model
        return view('travel.stays', compact('stays'));
        
    }

    public function book($id)
    {
        // Fetch the stay details by id
        $stay = Stay::findOrFail($id);
        
        // Return a booking page (create a view for booking)
        return view('travel.book', compact('stay'));
    }


    public function confirm($id)
    {
        // Yahan aap apna logic likh sakte ho
        return view('travel.confirm', ['id' => $id]);

    }
    public function show($id)
    {
        // Find the stay by ID
        $stay = Stay::findOrFail($id);

        // Return the view and pass the stay data to it
        return view('travel.show', compact('stay'));
    }

    
}
