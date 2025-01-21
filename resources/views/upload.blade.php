@extends('layouts.templateAdmin')
@section('content')

<form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="flex flex-wrap justify-between">
        <!-- Kiri -->
        <div class="w-full sm:w-2/5 mt-10 sm:mx-auto sm:max-w-sm bg-white p-4 opacity-90 rounded-xl">
            <h1 class="text-3xl font-bold text-black">Upload Document</h1>
                    <div class="mt-10">
                        <label class="block text-xl font-medium text-gray-900" for="fileInput">File name
                            <span>
                                <p class="mt-1 text-sm text-red-800" id="path">Format : SOP_ & minimal length 8</p>
                            </span>
                        </label>
                        <div class="mt-2">
                            <input id="filename" name="filename" type="text" autocomplete="title" placeholder="Input Document title" required class="block w-full rounded-md py-1.5 text-gray-600 p-2 border-gray-300 border placeholder:text-gray-400 sm:text-sm sm:leading-6">
                        </div>
                    </div>
            {{-- category dropdown --}}
            <div class="mb-4">
                <label for="category" class="block text-xl font-medium text-black mt-12">Category</label>
                <select id="category" name="category" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-black">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->catid }}">{{ $category->dept }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Kanan -->
        <div class="w-full sm:w-2/5 mt-20 sm:mx-auto sm:max-w-sm bg-white p-4 opacity-90 rounded-xl">
            <div class="mb-6">
                <label class="block text-xl font-medium text-gray-900" for="fileInput">Upload file
                    <span>
                        <p class="mt-1 text-sm text-red-800" id="path">PDF (MAX. 3mb).</p>
                    </span>
                </label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 py-2 px-3" type="file" id="fileInput" name="path" accept="application/pdf" required onchange="updateFileSizeLabel(this)">
                <div class="mt-2">
                    <label class="text-sm text-gray-600">File Size:</label>
                    <span id="file_size_label" class="text-sm text-gray-900"></span>
                </div>
            </div>
                {{-- <div class="mb-6">
                    <label class="block text-xl text-black" for="version">Version</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg py-2 px-3" type="number" id="version" name="version" required>
                </div> --}}
        </div>
    </div>

    <!-- Submit -->
    <div class="error flex justify-center mt-5">
        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="flex justify-center mt-10">
        <button type="submit" class="flex justify-center w-full sm:w-2/5 rounded-md bg-red-800 px-3 py-1.5 text-sm font-bold leading-6 text-white shadow-sm hover:bg-rose-900  hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            SUBMIT
        </button>
    </div>
</form>

<script>
    function updateFileSizeLabel(input) {
        const fileSizeLabel = document.getElementById('file_size_label');
        if (input.files.length > 0) {
            const fileSize = input.files[0].size; // File size in bytes
            const fileSizeInMB = fileSize / (1024 * 1024); // Convert to MB
            fileSizeLabel.textContent = `File size: ${fileSizeInMB.toFixed(2)} MB`;
        } else {
            fileSizeLabel.textContent = ''; // Clear the label if no file selected
        }
    }
</script>

@endsection