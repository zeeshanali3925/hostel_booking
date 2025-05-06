<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hostel;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'check-in' => 'required|date',
            'check-out' => 'required|date|after:check-in',
            'guests' => 'required|integer|min:1',
        ]);

        $hostels = Hostel::where('availability', '>=', $request->input('check-in'))
                         ->where('availability', '<=', $request->input('check-out'))
                         ->where('capacity', '>=', $request->input('guests'))
                         ->get();

        return view('search_results', compact('hostels'));
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 08d23048286da9052358b69b8d1e15dbb96fd314
