<?php 

namespace App\Http\Controllers;

use App\Models\Hostel;
use App\Models\User; // User model کو import کریں
use Illuminate\Http\Request;

class HostelController extends Controller
{
    public function index()
    {
        $hostels = Hostel::all();
        $users = User::all(); // Users کا data بھی fetch کریں

        if ($hostels->isEmpty()) {
            dd("no hostels found in database");
        }

        return view('users.index', compact('hostels', 'users')); // users بھی پاس کریں
    }
}
