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
        $pdfFiles = File::with(['category','user' => function ($query) {
            $query->select('catid', 'dept');
            $query->select('userid','username');// Select only necessary columns
        }])
        ->whereIn('fileid', function ($query) {
            $query->selectRaw('MAX(fileid)')
                ->from('files')
                ->groupBy('filename', 'catid');
        })
        ->orderBy('filename')
        ->orderBy('version', 'desc')
        ->paginate(10);

        date_default_timezone_set('Asia/Jakarta');
        $currentTime = date('H');
        $greeting = 'Good Morning';
        if ($currentTime >= 12 && $currentTime < 18) {
            $greeting = 'Good Afternoon';
        } elseif ($currentTime >= 18) {
            $greeting = 'Good Evening';
        }
        $categories = Category::all();

        return view('userpage', compact('greeting','pdfFiles', 'categories'));
    }
    public function showFileAdmin()
    {
        $pdfFiles = File::with(['category','user' => function ($query) {
            $query->select('catid', 'dept');
            $query->select('userid','username');// Select only necessary columns
        }])
        ->whereIn('fileid', function ($query) {
            $query->selectRaw('MAX(fileid)')
                ->from('files')
                ->groupBy('filename', 'catid');
        })
        ->orderBy('filename')
        ->orderBy('version', 'desc')
        ->paginate(10);

        $categories = Category::all();

        return view('adminpage', compact('pdfFiles', 'categories'));
    }

    public function userManagement()
    {
        $userFiles = User::all();
        return view('userManagement', compact('userFiles'));
    }

    public function upload(Request $request)
    {
        $validatedData = $request->validate([
            'filename' => 'required|min:8|regex:/^SOP_/',
            'category' => 'required',
            // 'version' => 'required|integer',
            'path' => 'required|file|mimes:pdf|max:3072', // Max size 3MB (3072 KB)
        ]);

        $file = new File();
        $file->filename = $validatedData['filename'];
        $file->catid = $validatedData['category'];
        $file->version = 1;

        $validatedData['path'] = $request->file('path')->store('pdf-SOP');
        $size = Storage::size($validatedData['path']);
        $file->path = $validatedData['path'];
        $file->size = $size;
        $file->userid = auth()->id();
        $file->date = now();
        $file->save();

        return redirect()->route('adminpage')->with('success', 'File uploaded successfully');
    }

    public function showcategory()
    {
        $categories = Category::all();
        return view('upload', compact('categories'));
    }

    public function download($fileid)
    {
        $pdfFile = File::findOrFail($fileid);
        $filePath = public_path('storage/' . $pdfFile->path);

        return response()->download($filePath, $pdfFile->filename . '.' . pathinfo($filePath, PATHINFO_EXTENSION));
    }

    public function toVersioning($fileid)
    {
        $pdfFiles = File::with('category', 'user')
        ->where('fileid', $fileid)
        ->orWhere(function ($query) use ($fileid) {
            // Subquery to find files with the same filename and catid as the specific file
            $query->where('filename', function ($subquery) use ($fileid) {
                $subquery->select('filename')
                    ->from('files')
                    ->where('fileid', $fileid);
            })->where('catid', function ($subquery) use ($fileid) {
                $subquery->select('catid')
                    ->from('files')
                    ->where('fileid', $fileid);
            });
        })
        ->get();

        // Pass the retrieved files to the 'versioning' view
        return view('versioning', compact('pdfFiles'));
    }
    public function update(Request $request, $fileid)
    {
     
        $validatedData = $request->validate([
            'filename' => 'required',
            'category' => 'required',
            // 'version' => 'required|integer',
            'path' => 'required|file|mimes:pdf|max:3072', // Max size 3MB (3072 KB)
        ]);

        $pdfFile = File::with('category', 'user')->findOrFail($fileid);

        $latestVersion = File::where('filename', $pdfFile->filename)
            ->where('catid', $pdfFile->catid)
            ->orderByDesc('fileid')
            ->first()->version;

        $file = new File();
        $file->filename = $validatedData['filename'];
        $file->catid = $validatedData['category'];
        $file->version = $latestVersion+1;


        $validatedData['path'] = $request->file('path')->store('pdf-SOP');

        $size = Storage::size($validatedData['path']);
        $file->path = $validatedData['path'];
        $file->size = $size;
        $file->userid = auth()->id();
        $file->date = now();

        $file->save();
        
        return redirect()->route('adminpage', ['fileid' => $fileid])->with('success', 'File uploaded successfully');
    }
    public function toUpdate($fileid)
    {
        $pdfFile = File::with('category', 'user')->findOrFail($fileid);

        $latestVersion = File::where('filename', $pdfFile->filename)
            ->where('catid', $pdfFile->catid)
            ->orderByDesc('fileid')
            ->first()->version;

        return view('update', compact('pdfFile', 'latestVersion'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->query('search');
    
        // Select records with the highest version number for each filename and catid
        $pdfFiles = File::select('files.*')
            ->whereIn('fileid', function ($query) use ($searchTerm) {
                $query->selectRaw('MAX(fileid)')
                    ->from('files')
                    ->where('filename', 'like', '%' . $searchTerm . '%')
                    ->groupBy('filename', 'catid');
            })
            ->orderBy('filename')
            ->orderBy('version', 'desc')
            ->paginate(10);
    
        $categories = Category::all();
    
        return view('adminpage', compact('pdfFiles', 'categories'));
    }

    public function searchUser(Request $request)
    {
        $searchTerm = $request->query('search');

        $pdfFiles = File::select('files.*')
            ->whereIn('fileid', function ($query) use ($searchTerm) {
                $query->selectRaw('MAX(fileid)')
                    ->from('files')
                    ->where('filename', 'like', '%' . $searchTerm . '%')
                    ->groupBy('filename', 'catid');
            })
            ->orderBy('filename')
            ->orderBy('version', 'desc')
            ->paginate(10);
        
        date_default_timezone_set('America/New_York');
        $currentTime = date('H');
        $greeting = 'Good Morning';
        if ($currentTime >= 12 && $currentTime < 18) {
            $greeting = 'Good Afternoon';
        } elseif ($currentTime >= 18) {
            $greeting = 'Good Evening';
        }

        $categories = Category::all();

        return view('userpage', compact('pdfFiles', 'categories', 'greeting'));
    }

    public function filter(Request $request)
    {
        $categoryId = $request->query('category');

        // Select records with the highest version number for each filename and catid
        $pdfFiles = File::select('files.*')
            ->whereIn('fileid', function ($query) use ($categoryId) {
                $query->selectRaw('MAX(fileid)')
                    ->from('files')
                    ->groupBy('filename', 'catid');

                if ($categoryId) {
                    $query->where('catid', $categoryId);
                }
            })
            ->orderBy('filename')
            ->orderBy('version', 'desc')
            ->paginate(10);

        $categories = Category::all();

        return view('adminpage', compact('pdfFiles', 'categories'));
    }

    public function filterUser(Request $request)
    {
        $categoryId = $request->query('category');

            $pdfFiles = File::select('files.*')
            ->whereIn('fileid', function ($query) use ($categoryId) {
                $query->selectRaw('MAX(fileid)')
                    ->from('files')
                    ->groupBy('filename', 'catid');

                if ($categoryId) {
                    $query->where('catid', $categoryId);
                }
            })
            ->orderBy('filename')
            ->orderBy('version', 'desc')
            ->paginate(10);
        
        date_default_timezone_set('America/New_York');
        $currentTime = date('H');
        $greeting = 'Good Morning';
        if ($currentTime >= 12 && $currentTime < 18) {
            $greeting = 'Good Afternoon';
        } elseif ($currentTime >= 18) {
            $greeting = 'Good Evening';
        }

        $categories = Category::all();
        return view('userpage', compact('pdfFiles', 'categories', 'greeting'));
    }

    public function searchManagement(Request $request)
    {
        $searchTerm = $request->query('search');

        $userFiles = User::where('username', 'like', '%' . $searchTerm . '%')->get();
        $users = User::all();

        return view('userManagement', compact('userFiles', 'users'));
    }

    public function filterManagement(Request $request)
    {
        $roleId = $request->query('role');

        if ($roleId) {
            $userFiles = User::where('role', $roleId)->get();
        } else {
            $userFiles = User::all();
        }

        $users = User::all();
        return view('userManagement', compact('userFiles', 'users'));
    }

}