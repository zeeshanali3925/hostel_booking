<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        // Sample data for packages
        $packages = [
            [
                'title' => 'Beach Paradise',
                'price' => '$999',
                'desc' => 'Enjoy the sun, sand, and sea on a beautiful beach!',
                'image' => 'https://example.com/images/beach-paradise.jpg',
            ],
            [
                'title' => 'Mountain Adventure',
                'price' => '$1200',
                'desc' => 'Conquer the highest peaks and explore nature!',
                'image' => 'https://example.com/images/mountain-adventure.jpg',
            ],
        ];

        // Passing the packages data to the view
        return view('travel.pakages', compact('packages'));  // Make sure this matches your view name
    }
}


