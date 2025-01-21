@extends('layouts.templateUser')
@section('content')

<div class="ml-14 mt-10">
    <div class="flex typing max-w-96">
        <h1 class="items-center flex-col animate-typing overflow-hidden whitespace-nowrap md:order-2 md:space-x-0 rtl:space-x-reverse text-red-700 text-lg font-bold">{{ $greeting }}, {{Auth::user()->username}}!</h1>
    </div>
  
    <div class="dropdownSeacrh mt-5">
        <div class="flex mt-5">
            <div class="search mr-2">
                <form class="flex" action="{{ route('searchUser') }}" method="GET">
                    <input class="w-80 p-2 border border-gray-300 rounded-l-lg focus:outline-none" type="search" name="search" placeholder="Search Title" aria-label="Search" value="{{ request()->input('search') }}">
                    <button class="p-2 bg-white border border-gray-300 rounded-r-lg focus:outline-none hover:bg-red-800 hover:text-white" type="submit">Search</button>
                </form>
            </div>
        
            <div class="dropdown ml-auto">
                <form class="flex" action="{{ route('filterUser') }}" method="GET" id="filterForm">
                    <div class="relative flex-auto">
                        <select id="category" name="category" onchange="submitForm()" class="w-80 mr-10 block py-2.5 px-2 border border-gray-300 bg-white text-sm font-medium rounded text-black">
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
    </div>

    <div class="tabel relative overflow-auto overflow-y-auto shadow-md sm:rounded-lg mt-5 max-h-96 mr-10">
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
    <div class="pagination flex flex-col items-center mt-10">
        <!-- Help text -->
        <span class="text-sm text-black">
            Showing <span class="font-semibold text-red-800">{{ $pdfFiles->firstItem() }}</span> to <span class="font-semibold text-red-800">{{ $pdfFiles->lastItem() }}</span> of <span class="font-semibold text-red-800">{{ $pdfFiles->total() }}</span> Entries
        </span>
        
        <!-- Tailwind Paginator Buttons -->
        <div class="inline-flex mt-2 xs:mt-0">
            @if ($pdfFiles->onFirstPage())
                <button class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-300 rounded-l-lg cursor-not-allowed" disabled>
                    Prev
                </button>
            @else
                <a href="{{ $pdfFiles->previousPageUrl() }}" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-red-800 rounded-l-lg hover:bg-black">
                    Prev
                </a>
            @endif
    
            @if ($pdfFiles->hasMorePages())
                <a href="{{ $pdfFiles->nextPageUrl() }}" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-red-800 border-0 border-s border-gray-700 rounded-r-lg hover:bg-black">
                    Next
                </a>
            @else
                <button class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-300 rounded-r-lg cursor-not-allowed" disabled>
                    Next
                </button>
            @endif
        </div> 
</div>

{{-- {{ $pdfFiles->links() }} --}}

@endsection