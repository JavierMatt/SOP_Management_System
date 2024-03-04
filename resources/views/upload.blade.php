@extends('layouts.templateAdmin')
@section('content')

    <div class="flex flex-wrap justify-between">

        <!-- Kiri -->
        <div class="w-full sm:w-2/5 mt-10 sm:mx-auto sm:max-w-sm bg-white p-4 opacity-90 rounded-xl">
            <h1 class="text-2xl font-bold text-black">Upload Document</h1>

            <form class="space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                    <div>
                        <h3 class="text-xl font-semibold mb-2">Title</h3>
                        <div class="mt-2">
                            <input id="title" name="title" type="text" autocomplete="title" placeholder="Input Document title" required class="block w-full rounded-md py-1.5 text-gray-600 p-2 border-solid border-2 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                
                    <div>
                        <h3 class="text-xl font-semibold mb-2">Contributor</h3>
                        <div class="mt-2">
                            <input id="contributor" name="contributor" type="text" autocomplete="contributor" placeholder="Input Contributor" required class="block w-full rounded-md py-1.5 text-gray-600 p-2 border-solid border-2 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </form>
        </div>

        <!-- Kanan -->
        <div class="w-full sm:w-2/5 mt-24 sm:mx-auto sm:max-w-sm bg-white p-4 opacity-90 rounded-xl">
            <h3 class="text-xl font-semibold mb-2">Department</h3>
            <div class="dropdown mt-2">
                <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-black bg-white border border-gray-300 rounded-xl" type="button">
                    Choose Department 
                    <i class="fa-solid fa-caret-down pl-5" style="color: #000000;"></i>
                </button>
                            
                            
                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 absolute">
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
            </div>
                       
            <div>
                <label class="block mt-6 mb-2 text-xl font-medium text-gray-900" for="file_input">Upload file</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" aria-describedby="file_input_help" id="file_input" type="file">
                <p class="mt-1 text-sm text-red-800" id="file_input_help">PDF(MAX. 3mb).</p>
            </div>
        </div>

    </div>

    <!-- Submit -->
    <div class="flex justify-center mt-20">
        <button type="submit" class="flex justify-center w-full sm:w-2/5 rounded-md bg-red-800 px-3 py-1.5 text-sm font-bold leading-6 text-white shadow-sm hover:bg-rose-900  hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Login
        </button>
    </div>

{{-- <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="filename">File Name:</label>
        <input type="text" id="filename" name="filename" required>
    </div>
    <div>
        <label for="category">Category:</label>
        <select id="category" name="category" required>
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->catid }}">{{ $category->dept }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="version">Version:</label>
        <input type="number" id="version" name="version" required>
    </div>
    <div>
        <label for="path">Upload PDF File:</label>
        <input type="file" id="path" name="path" accept="application/pdf" required>
    </div>
    <div>
        <label>File Size:</label>
        <span id="file_size_label"></span>
    </div>
    <button type="submit">Submit</button>
</form>

<!-- JavaScript to display file size -->
<script>
    document.getElementById('path').addEventListener('change', function() {
        var fileSize = this.files[0].size;
        var fileSizeLabel = (fileSize / (1024 * 1024)).toFixed(2) + ' MB';
        document.getElementById('file_size_label').textContent = fileSizeLabel;
    });
</script> --}}

@endsection
