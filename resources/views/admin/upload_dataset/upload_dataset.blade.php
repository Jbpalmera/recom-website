@if(session('status')) <div>{{ session('status') }}</div> @endif
@if(session('error')) <div>{{ session('error') }}</div> @endif

<form action="{{ url('/upload-dataset') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label>Select Excel file:</label>
    <input type="file" name="dataset" accept=".xlsx,.xls" required>
    <button type="submit">Upload & Retrain (path)</button>
</form>

<!-- To use multipart upload, change action to route that calls uploadDatasetMultipart -->
