@extends('layouts.templateAdmin')

@section('content')
<div class="container">
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
</div>
@endsection