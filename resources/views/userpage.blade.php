@extends('layouts.templateUser')
@section('content')

<div class="ml-14 mt-5">
    <h1 class="text-4xl font-bold text-lack">Dashboard</h1>

    <div class="dropdownSeacrh mt-5">
        <div class="flex mt-5">
            <div class="search mr-2">
                <form class="flex" action="{{ route('search') }}" method="GET">
                    <input class="w-80 p-2 border border-gray-300 rounded-l-lg focus:outline-none" type="search" name="search" placeholder="Search" aria-label="Search" value="{{ request()->input('search') }}">
                    <button class="p-2 bg-white border border-gray-300 rounded-r-lg focus:outline-none hover:bg-red-800 hover:text-white" type="submit">Search</button>
                </form>
            </div>
        
            <div class="dropdown ml-auto">
                <form class="flex" action="{{ route('filter') }}" method="GET" id="filterForm">
                    <div class="relative flex-auto">
                        <select id="category" name="category" onchange="submitForm()" class="w-80 mr-10 block py-2.5 px-2 border border-gray-300 bg-white text-sm font-medium rounded">
                            <option value="" disabled selected>Select Category</option> <!-- Placeholder -->
                            <option value="">All Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->catid }}">{{ $category->dept }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
        </div>

        {{-- script auto click filter --}}
        <script>
            function submitForm() {
                document.getElementById('filterForm').submit();
            }
        </script>

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

    <div class="tabel relative overflow-x-auto overflow-y-auto shadow-md sm:rounded-lg mt-5 mr-10">
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
        </table>
    </div>  
</div>

@endsection