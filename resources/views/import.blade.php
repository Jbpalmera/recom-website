<!DOCTYPE html>
<html>
<head>
    <title>Import Excel</title>
    <style>
        .error { color: red; }
        .success { color: green; }
        .form-container { max-width: 500px; margin: 20px; }
        .file-input { margin: 10px 0; }
        button { padding: 10px 20px; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Upload Excel File</h1>

        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data" id="importForm">
            @csrf
            <div class="file-input">
                <label for="file">Choose Excel File (xlsx, xls, csv):</label><br>
                <input type="file" id="file" name="file" accept=".xlsx,.xls,.csv" required>
                <small>Maximum file size: 10MB</small>
            </div>
            <button type="submit" id="submitBtn">Import</button>
        </form>
    </div>

    <script>
        document.getElementById('importForm').addEventListener('submit', function(e) {
            const fileInput = document.getElementById('file');
            const submitBtn = document.getElementById('submitBtn');
            
            if (!fileInput.files[0]) {
                e.preventDefault();
                alert('Please select a file to upload.');
                return false;
            }
            
            // Disable submit button to prevent double submission
            submitBtn.disabled = true;
            submitBtn.textContent = 'Importing...';

            // Re-enable button after 30 seconds (in case of error)
            setTimeout(function() {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Import';
            }, 30000);
        });
    </script>
</body>
</html>
