<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class UploadDataSetController extends Controller
{
    public function showUploadForm(){
        return view('admin.upload_dataset.upload_dataset');

    }

    // Option A: store file in Laravel and pass abs path to FastAPI
    public function uploadDataset(Request $request)
    {
        $request->validate(['dataset' => 'required|mimes:xlsx,xls']);

        // store in storage/app/datasets
        $path = $request->file('dataset')->store('datasets'); // storage/app/datasets/filename.xlsx
        $abs = storage_path('app/' . $path);

        // call FastAPI retrain endpoint (pass absolute path)
        $fastapiUrl = config('services.fastapi.url') . '/retrain';
        $apiKey = config('services.fastapi.key');

        $response = Http::timeout(300)
            ->withHeaders(['X-API-KEY' => $apiKey])
            ->asForm()
            ->post($fastapiUrl, [
                'file_path' => $abs
            ]);

        if ($response->successful()) {
            return redirect()->back()->with('status', 'Dataset uploaded — retrain started.');
        }

        return redirect()->back()->with('error', 'Failed to call retrain endpoint: ' . $response->body());
    }

    // Option B: send file directly as multipart to /retrain-file
    public function uploadDatasetMultipart(Request $request)
    {
        $request->validate(['dataset' => 'required|mimes:xlsx,xls']);

        $file = $request->file('dataset');
        $fastapiUrl = config('services.fastapi.url') . '/retrain-file';
        $apiKey = config('services.fastapi.key');

        $response = Http::timeout(300)
            ->withHeaders(['X-API-KEY' => $apiKey])
            ->attach('file', fopen($file->getRealPath(), 'r'), $file->getClientOriginalName())
            ->post($fastapiUrl);

        if ($response->successful()) {
            return redirect()->back()->with('status', 'Dataset uploaded and retrain started.');
        }
        return redirect()->back()->with('error', 'Failed to call retrain endpoint: ' . $response->body());
    }

    // Status endpoint to show retrain info
    public function status()
    {
        $fastapiUrl = config('services.fastapi.url') . '/status';
        $response = Http::timeout(10)->get($fastapiUrl);
        if ($response->successful()) {
            $data = $response->json();
            return view('retrain_status', ['status' => $data]);
        }
        return view('retrain_status', ['status' => null, 'error' => 'Cannot reach FastAPI']);
    }
}
