<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    public function showForm()
    {
        return view('register-property');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|string|max:10',
            'country' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'description' => 'nullable|string',
        ]);

        Property::create($request->all());

        return redirect()->back()->with('success', 'Property Registered Successfully!');
    }
}