<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    public function index()
{
    $admin = Auth::guard('admin')->user();
    return view('admin.profile.adminProfile', compact('admin'));
}


    public function update(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $request->validate([
            'name' => 'required|string|max:255'. $admin->id,
        ]);

        $admin->update($request->only('name'));


        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
