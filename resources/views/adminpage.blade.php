@extends('template')

@section('content')
<div class="container">
    <h1>PDF Files</h1>
    <h5>Logged in as: {{ Auth::user()->username }}</h5>
    <h5>Current Role: {{ Auth::user()->role }}</h5>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <form class="d-flex" action="{{ route('search') }}" method="GET">
                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search" value="{{ request()->input('search') }}">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        
            <form class="d-flex" action="{{ route('filter') }}" method="GET" id="filterForm">
    <select id="category" name="category" onchange="submitForm()">
        <option value="" disabled selected>Select Category</option> <!-- Placeholder -->
        <option value="">All Category</option>
        @foreach($categories as $category)
            <option value="{{ $category->catid }}">{{ $category->dept }}</option>
        @endforeach
    </select>
</form>

<script>
    function submitForm() {
        document.getElementById('filterForm').submit();
    }
</script>



        </div>
    </nav>
    <div class="row">
        @foreach($pdfFiles as $pdfFile)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $pdfFile->filename }}</h5>
                    <p class="card-text">Category: {{ $pdfFile->category->dept }}</p>
                    <p class="card-text">contributor: {{ $pdfFile->user->username }}</p>
                    <p class="card-text">Version: {{ $pdfFile->version }}</p>
                    <p class="card-text">size: {{ $pdfFile->size }} kb</p>
                    <p class="card-text">date: {{ $pdfFile->date }}</p>
                    <a href="{{ route('file.download', ['fileid' => $pdfFile->fileID]) }}" class="btn btn-success">Download PDF</a>
                    <a href="{{ route('toversioning', ['fileid' => $pdfFile->fileID]) }}" class="btn btn-success">View other version</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection