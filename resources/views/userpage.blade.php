@extends('layouts.templateUser')
@section('content')

<div class="ml-14 mt-5">
    <h1 class="text-2xl font-bold text-lack">Dashboard</h1>

    <div class="dropdownSeacrh mt-5">
        <form class="max-w-lg">
            <div class="flex">
                <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-black bg-white border border-gray-300 rounded-s-lg" type="button">All categories 
                    <i class="fa-solid fa-caret-down pl-5" style="color: #000000;"></i>
                </button>
                
                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 mt-10 absolute">
                    <ul class="py-2 text-sm text-black" aria-labelledby="dropdown-button">
                        <li>
                            <a href="#" class="inline-flex w-full px-4 py-2">IT</a>
                        </li>
                        <li>
                            <a href="#" class="inline-flex w-full px-4 py-2">Branch</a>
                        </li>
                        <li>
                            <a href="#" class="inline-flex w-full px-4 py-2">Sales</a>
                        </li>
                        <li>
                            <a href="#" class="inline-flex w-full px-4 py-2">Syaria</a>
                        </li>
                    </ul>
                </div>
                
                <script>
                    const dropdownButton = document.getElementById('dropdown-button');
                    const dropdown = document.getElementById('dropdown');
                
                    dropdownButton.addEventListener('click', () => {
                        dropdown.classList.toggle('hidden');
                    });
                </script>
                
                <div class="relative w-full">
                    <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-black bg-white rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 " placeholder="Search Mockups, Logos, Design Templates..." required />
                    <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-gray-300 rounded-e-lg border border-gray-300">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </div>
        </form>


        {{-- <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-black bg-white font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center border border-transparent border-gray-300 focus:border-gray-300 focus:outline-none" type="button">
            Select Department
            <i class="fa-solid fa-caret-down pl-5" style="color: #000000;"></i>
        </button>
            
            <!-- Dropdown menu -->
            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                </li>
                </ul>
        </div> --}}
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
                                <a href="{{ route('file.download', ['fileid' => $pdfFile->fileID]) }}">
                                    <i class="fa-solid fa-download fa-lg" style="color: #000000;"></i>
                                </a>
                                <a href="{{ route('toversioning', ['fileid' => $pdfFile->fileID]) }}">
                                    <i class="fa-solid fa-clock-rotate-left fa-lg" style="color: #000000;"></i>
                                </a>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>  
</div>

@endsection