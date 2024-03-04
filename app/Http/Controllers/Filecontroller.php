<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class Filecontroller extends Controller
{
    //
    public function showFileUser()
    {

        // logik
        return view('userpage');
    }
    public function showFileAdmin()
{
    $pdfFiles = File::all();
    foreach ($pdfFiles as $pdfFile) {
        $pdfFile->category = Category::find($pdfFile->catid); // Fetch the category for each file
    }
    return view('adminpage', compact('pdfFiles'));
}
    public function upload(Request $request)
{
    // return $request ->file('path')->store('pdf-SOP');
    $validatedData = $request->validate([
        'filename' => 'required',
        'category' => 'required',
        'version' => 'required|integer',
        'path' => 'required|file|mimes:pdf|max:3072', // Max size 3MB (3072 KB)
    ]);

    $file = new File();
    $file->filename = $validatedData['filename'];
    $file->catid = $validatedData['category'];
    $file->version = $validatedData['version'];

  
    $validatedData['path'] = $request->file('path')->store('pdf-SOP');

    $size = Storage::size($validatedData['path']);
    $file->path = $validatedData['path'];
    $file->size = $size;
    $file->userid = auth()->id(); // Assuming user is authenticated
    $file->date = now(); // Set the current date
    
    $file->save();

    return redirect()->back()->with('success', 'File uploaded successfully');
}
    


    public function showcategory()
    {
        $categories = Category::all(); // Fetch all categories from the database
        return view('upload', compact('categories'));
    }
    
        public function download($fileid)
{
    $pdfFile = File::findOrFail($fileid);
    $filePath = public_path('storage/' . $pdfFile->path); 
    return response()->download($filePath);
}
    }


