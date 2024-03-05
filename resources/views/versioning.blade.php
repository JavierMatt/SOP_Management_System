@extends('layouts.templateAdmin')

@section('content')

<aside id="default-sidebar" class="absolute left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>
    <div class="sideNav">               
        <div id="sidebar" class="bg-red-800 h-screen md:block shadow-xl px-3  w-30 md:w-60 lg:w-60 overflow-x-hidden transition-transform duration-300 ease-in-out" x-show="sidenav" @click.away="sidenav = false">
                
            <div class="space-y-6 md:space-y-10 mt-10">
        
                <div id="profile" class="space-y-3">
                    <img src="{{ asset('images/profile.png') }}" alt="Avatar user" class="w-10 md:w-16 rounded-full mx-auto"/>
                <div> 

                        <h2 class="font-medium text-xs md:text-sm text-center text-white">
                            Oliver Sebastian
                        </h2>
                        <p class="text-xs text-white text-center">Super Admin</p>
                        </div>
                    </div>
        
                    <div id="" class="flex flex-col space-y-2">
                        <a href="{{ url('/adminpage') }}" class="text-sm font-medium text-white py-2 px-2 hover:bg-gray-500 hover:text-white  rounded-md transition duration-150 ease-in-out">
                            <i class="fas fa-house" style="color: #ffffff;"></i>
                            <span class="">Dashboard</span>
                        </a>
                    
                        <a href="{{ url('/userManagement') }}" class="text-sm font-medium text-white py-2 px-2 hover:bg-gray-500 hover:text-white rounded-md transition duration-150 ease-in-out">
                            <i class="fa-solid fa-user" style="color: #ffffff;"></i>
                            <span class="">User Management</span>
                        </a>
        
                        <a href="{{ url('/') }}" class="text-sm font-medium text-white py-2 px-2 hover:bg-gray-500 hover:text-white rounded-md transition duration-150 ease-in-out">
                            <i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i>
                            <span class="">Logout</span>
                        </a>
                    </div>
                </div>
    </div> 
</aside>

<div class="p-4 sm:ml-64 flex-grow">
    <h1 class="text-4xl font-bold text-black">{{ $pdfFiles->first()->filename }}</h1>
    <h2 class="text-xl font-bold text-black mt-5">Department : {{ $pdfFiles->first()->category->dept }}</h2>

    <div class="mt-5">
        <a href="{{ route('toUpdate', ['fileid' => $pdfFiles->first()->fileID]) }}" class="py-2 px-4 bg-red-800 text-white font-semibold rounded-lg hover:bg-white hover:text-red-800">Update</a>
    </div>
    
    <div class="tabel relative overflow-x-auto overflow-y-auto shadow-md sm:rounded-lg mt-5">
        <table class="w-full text-sm text-center text-black">
            <thead class="text-xs text-white uppercase bg-red-800 sticky top-0">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Size
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Contributor
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Version
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>

                <tbody>
                    {{-- data masi hardcode --}}
                    @foreach($pdfFiles as $pdfFile)
                        <tr class="bg-white border-b border-black text-black cursor-pointer" onclick="window.location='#';">
                            <th class="px-6 py-4 font-medium">
                                {{  $pdfFile->filename }}
                            </th>
                            <th class="px-6 py-4 font-medium">
                                {{  $pdfFile->category->dept }}
                            </th>
                            <td class="px-6 py-4">
                                {{  $pdfFile->size }}
                            </td>
                            <td class="px-6 py-4">
                                {{  $pdfFile->user->username }}
                            </td>
                            <td class="px-6 py-4">
                                {{  $pdfFile->date }}
                            </td>
                            <td class="px-6 py-4">
                                {{  $pdfFile->version }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('file.download', ['fileid' => $pdfFile->fileID]) }}">
                                    <i class="fa-solid fa-download fa-lg" style="color: #000000;"></i>
                                </a>
                                {{-- <a href="{{ route('toversioning', ['fileid' => $pdfFile->fileID]) }}">
                                    <i class="fa-solid fa-clock-rotate-left fa-lg" style="color: #000000;"></i>
                                </a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>

    {{-- <div class="container">
        <h1>Versioning</h1>
        <div class="row">
            <div class="col-md-12">
                <h2>File: {{ $pdfFiles->first()->filename }}</h2>
                    <h3>Department: {{ $pdfFiles->first()->category->dept }}</h3>
                    
                    <a href="{{ route('toUpdate', ['fileid' => $pdfFiles->first()->fileID]) }}" class="btn btn-primary">Update</a>

                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Other Versions:</h3>
                <div class="row">
                    @foreach($pdfFiles as $pdfFile)
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $pdfFile->filename }}</h5>
                                    <p class="card-text">Version: {{ $pdfFile->version }}</p>
                                    <p class="card-text">Date: {{ $pdfFile->date }}</p>
                            
                                        <p class="card-text">Department: {{ $pdfFile->category->dept }}</p>
                                
                                
                                        <p class="card-text">Username: {{ $pdfFile->user->username }}</p>
                                        <p class="card-text">Size: {{ $pdfFile->size }}</p>
                                    <a href="{{ route('file.download', ['fileid' => $pdfFile->fileID]) }}" class="btn btn-success">Download PDF</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
