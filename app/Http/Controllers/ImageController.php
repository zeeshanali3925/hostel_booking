<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image; // Correct model name used

class ImageController extends Controller
{
    // Upload Image and Save in Session Only (No DB)
    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120'  // 5MB
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);

            // Save image name in session (optional)
            session()->put('image', $imageName);

            return back()->with('success', 'Image uploaded successfully.');
        }

        return back()->with('error', 'No image selected.');
    }

    // Delete Image from Folder
    public function deleteImage(Request $request)
    {
        $imageName = $request->input('image_name');
        $path = public_path('uploads/' . $imageName);

        if (file_exists($path)) {
            unlink($path);
            return back()->with('success', 'Image deleted successfully!');
        } else {
            return back()->with('error', 'Image not found.');
        }
    }

    // Upload Image and Save in Database
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',  // 2MB
        ]);

        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $fileName);

        // Save in database
        Image::create([
            'image_name' => $fileName,
            'title' => 'Default Title',
            'description' => 'Default description for this image.',
        ]);

        return back()->with('success', 'Image uploaded successfully')->with('image', $fileName);
    }

    // Show Image Details from DB
    public function show($id)
    {
        $image = Image::findOrFail($id);
        return view('image_detail', compact('image'));
    }






}