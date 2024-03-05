@extends('template')
@section('content')
<h1>Upload Form</h1>

<form action="{{ route('update',['fileid' => $pdfFile->fileID]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="filename">File Name:</label>
        <input type="text" id="filename" name="filename" value="{{ $pdfFile->filename }}" readonly required>
    </div>
    <div>
        <label for="category">Category:</label>
        <input type="text" value="{{ $pdfFile->category->dept }}" readonly>
        <input type="hidden" id="category" name="category" value="{{ $pdfFile->catid }}" readonly required>
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
</script>
@endsection