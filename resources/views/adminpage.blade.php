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

                            <h1 class="font-medium text-xl md:text-xl text-center text-white">
                                {{Auth::user()->username}}
                            </h1>
                            <p class="text text-white text-center">{{Auth::user()->role}}</p>
                            </div>
                        </div>
            
                        <div id="{{ url('/adminpage') }}" class="flex flex-col space-y-2">
                            <a href="" class="text-sm font-medium text-white py-2 px-2 hover:bg-gray-500 hover:text-white  rounded-md transition duration-150 ease-in-out">
                                <i class="fas fa-house" style="color: #ffffff;"></i>
                                <span class="">Dashboard</span>
                            </a>
                        
                            <a href="{{ url('/userManagement') }}" class="text-sm font-medium text-white py-2 px-2 hover:bg-gray-500 hover:text-white rounded-md transition duration-150 ease-in-out">
                                <i class="fa-solid fa-user" style="color: #ffffff;"></i>
                                <span class="">User Management</span>
                            </a>

                            <a href="{{ url('/changePass') }}" class="text-sm font-medium text-white py-2 px-2 hover:bg-gray-500 hover:text-white rounded-md transition duration-150 ease-in-out">
                                <i class="fa-solid fa-key" style="color: #ffffff;"></i>
                                <span class="">Change Password</span>
                            </a>

                            <a href="{{ route('logout') }}" class="text-sm font-medium text-white py-2 px-2 hover:bg-gray-500 hover:text-white rounded-md transition duration-150 ease-in-out">
                                <i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i>
                                <span class="">Logout</span>
                            </a>
                        </div>
                    </div>
        </div> 
    </aside>
 
    <div class="p-4 sm:ml-64 flex-grow">
        <h1 class="text-4xl font-bold text-black">Dashboard</h1>
        
        {{-- seacrh and filtering --}}
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
                        <select id="category" name="category" onchange="submitForm()" class="w-80 block py-2.5 px-2 border border-gray-300 bg-white text-sm font-medium rounded">
                            <option value="" disabled selected>Select Category</option> <!-- Placeholder -->
                            <option value="">All Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->catid }}">{{ $category->dept }}</option>
                            @endforeach
                        </select>
                        {{-- <div class="absolute inset-y-0 right-10 flex items-center pointer-events-none mr-1">
                            <i class="fa-solid fa-caret-down" style="color: #000000;"></i>
                        </div> --}}
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

        <div class="tabel relative overflow-auto overflow-y-auto shadow-md sm:rounded-lg mt-5 max-h-96">
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


    <div class="plusButton">
        <a href="{{ url('/upload') }}" class="fixed bottom-4 right-4">
            <div class="bg-red-800 p-5 rounded-full">
                <i class="fa-solid fa-plus text-white"></i>
            </div>
        </a>
    </div>

 </div>

 {{-- {{ $pdfFiles->links() }} --}}
@endsection