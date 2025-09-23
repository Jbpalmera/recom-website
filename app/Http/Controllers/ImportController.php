<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ParticipantsImport;
use App\Imports\EventEvaluationImport;

class ImportController extends Controller
{
    /**
     * Show the import form
     */
    public function showForm()
    {
        return view('import');
    }

    /**
     * Handle the Excel import
     */
  public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls'
    ]);

    Excel::import(new EventEvaluationImport, $request->file('file'));

    return back()->with('success', 'All event data imported successfully!');
}
}
