<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HostelImage;

class HostelController extends Controller
{
   

    public function index()
    {
        $hostelsAll = HostelImage::all();
        return view('home', compact('hostelsAll')); // ✅ Yeh zaroori hai
    }
    




    public function store(Request $request)
    {
      
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        // Store image in 'public/hostels' folder
        $imagePath = $request->file('image')->store('hostels', 'public');
    
        // Save hostel with image path
        HostelImage::create([
            'title' => $request->title,
            'image' => $imagePath,
        ]);
    
        return redirect()->back()->with('success', 'Hostel created successfully!');
    }
        




   







}
