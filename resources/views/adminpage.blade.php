@extends('template')

@section('content')
<div class="container">
    <h1>PDF Files</h1>
    <div class="row">
        @foreach($pdfFiles as $pdfFile)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $pdfFile->filename }}</h5>
                    
                    <p class="card-text">Category: {{ $pdfFile->category->dept }}</p>
                    
                    <p class="card-text">Version: {{ $pdfFile->version }}</p>
                   
                    <a href="{{ route('file.download', ['fileid' => $pdfFile->fileID]) }}" class="btn btn-success">Download PDF</a>



                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
