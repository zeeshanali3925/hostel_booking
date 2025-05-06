<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    // Upload Image and Save in Database
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120'  // 5MB limit
        ]);

        if ($request->hasFile('image')) {


            $file = $request->file('image');

            // Clean file name
            $fileName = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());

            // ✅ Just move the file without resizing (NO distortion)
            $file->move(public_path('uploads'), $fileName);

            // ✅ Save correct path to DB
            Image::create([
                'image_path' => 'uploads/' . $fileName,
                'title' => 'Default Title',
                'description' => 'Default description for this image.',
            ]);

            return view('register-property')->with('error', 'No image selected.');


        }

        return redirect()->back()->with('error', 'No image selected.');
    }

    // Delete Image from Folder & Database
    public function destroy(Request $request)
    {
        $image = Image::findOrFail($request->id);
    
        // Delete file from storage
        $filePath = storage_path('app/public/images/' . $image->filename);
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    
        // Delete from database
        $image->delete();
    
        return back()->with('success', 'Image deleted successfully!');
    }
    
// app/Http/Controllers/ImageController.php

// app/Http/Controllers/ImageController.php

public function show($id)
{
    // Fetch the main image by its ID
    $image = Image::findOrFail($id);

    // Fetch related images (e.g., same user, category, or simply the latest images)
    // For simplicity, we are fetching the latest images except the current one
    $relatedImages = Image::where('id', '!=', $id)->latest()->take(6)->get();

    return view('image.show', compact('image', 'relatedImages'));
}



public function connect()
{
    $images = Image::with('property')->latest()->get();
    return view('welcome', compact('images'));
}



}
