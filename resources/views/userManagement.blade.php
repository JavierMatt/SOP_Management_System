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
        <h1 class="text-2xl font-bold text-lack">User Management</h1>

        <div class="dropdown mt-5">
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
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
            <table class="w-full text-sm text-center text-black">
                <thead class="text-xs text-white uppercase bg-red-800">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {{-- data masi hardcode --}}
                    <tr class="bg-white border-b border-black text-black cursor-pointer" onclick="window.location='#';">
                        <th scope="row title" class="px-6 py-4 font-medium">
                            Yonatan Lesmana
                        </th>
                        <td class="px-6 py-4">
                            Admin
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="mr-5">
                                <i class="fa-solid fa-pencil fa-xl" style="color: #000000;"></i>
                            </a>
                            <a href="#">
                                <i class="fa-solid fa-trash fa-xl" style="color: #000000;"></i>
                            </a>
                        </td>                        
                    </tr>
                </tr>
            </tbody>
        </table>
    </div>   


    <div class="plusButton">
        <a href="{{ url('/register') }}" class="fixed bottom-4 right-4">
            <div class="bg-red-800 p-5 rounded-full">
                <i class="fa-solid fa-plus text-white"></i>
            </div>
        </a>
    </div>

 </div>

@endsection
