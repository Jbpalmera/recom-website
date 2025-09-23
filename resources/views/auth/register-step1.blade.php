<!--
  register-step1.blade.php
  register-step2.blade.php
  Both views are included in this single file for your convenience — copy each section into its proper blade file.
-->

<!-- ==========================
     register-step1.blade.php
     ========================== -->
@extends('layouts.app')

@section('content')
<!-- Styles + icons (kept inline so classes apply even if your layout doesn't push stacks) -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<style>
    .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
    .card-shadow { box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15); }
    .form-input { transition: all 0.25s ease; border: 2px solid #e5e7eb; }
    .form-input:focus { border-color: #667eea; box-shadow: 0 0 0 6px rgba(102,126,234,0.08); transform: translateY(-1px); outline: none; }
    .checkbox-item { transition: all 0.12s ease; }
    .checkbox-item:hover { background-color: #f8fafc; transform: translateX(4px); }
    .progress-bar { background: linear-gradient(90deg, #667eea, #764ba2); }
</style>

<div class="gradient-bg min-h-screen py-8 px-4">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-white rounded-full shadow-lg mb-4">
                <i class="fas fa-user-plus text-3xl text-indigo-600"></i>
            </div>
            <h1 class="text-4xl font-bold text-white mb-2">Create Your Account</h1>
            <p class="text-indigo-100 text-lg">Step 1: Personal Information</p>
        </div>

        <!-- Progress Bar (50%) -->
        <div class="bg-white bg-opacity-20 rounded-full h-2 mb-8">
            <div class="progress-bar h-full rounded-full" style="width: 50%"></div>
        </div>

        <!-- Form Card -->
        <form action="{{ route('register.step1.store') }}" method="POST" class="bg-white rounded-3xl card-shadow p-8 space-y-6">
            @csrf

            <!-- Name row -->
            <div class="flex space-x-4">
                <div class="w-1/3">
                    <label class="block text-gray-700 font-medium">First Name</label>
                    <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-input w-full mt-2 p-3 rounded-xl" required>
                </div>
                <div class="w-1/6">
                    <label class="block text-gray-700 font-medium">Middle Initial</label>
                    <input type="text" name="middle_initial" maxlength="1" value="{{ old('middle_initial') }}" class="form-input w-full mt-2 p-3 rounded-xl">
                </div>
                <div class="w-1/3">
                    <label class="block text-gray-700 font-medium">Last Name</label>
                    <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-input w-full mt-2 p-3 rounded-xl" required>
                </div>
                <div class="w-1/6">
                    <label class="block text-gray-700 font-medium">Extension</label>
                    <select name="name_extension" class="form-input w-full mt-2 p-3 rounded-xl">
                        <option value="">None</option>
                        <option value="Jr." {{ old('name_extension') == 'Jr.' ? 'selected' : '' }}>Jr.</option>
                        <option value="Sr." {{ old('name_extension') == 'Sr.' ? 'selected' : '' }}>Sr.</option>
                        <option value="III" {{ old('name_extension') == 'III' ? 'selected' : '' }}>III</option>
                        <option value="IV" {{ old('name_extension') == 'IV' ? 'selected' : '' }}>IV</option>
                    </select>
                </div>
            </div>

            <!-- Gender & Age Group -->
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-700 font-medium">Gender</label>
                    <select name="gender" class="form-input w-full mt-2 p-3 rounded-xl" required>
                        <option value="">Select Gender</option>
                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium">Age Group</label>
                    <select name="age_group" class="form-input w-full mt-2 p-3 rounded-xl" required>
                        <option value="">Select Age Group</option>
                        <option value="Below 18" {{ old('age_group') == 'Below 18' ? 'selected' : '' }}>Below 18</option>
                        <option value="18-25" {{ old('age_group') == '18-25' ? 'selected' : '' }}>18-25</option>
                        <option value="26-35" {{ old('age_group') == '26-35' ? 'selected' : '' }}>26-35</option>
                        <option value="36-45" {{ old('age_group') == '36-45' ? 'selected' : '' }}>36-45</option>
                        <option value="46-60" {{ old('age_group') == '46-60' ? 'selected' : '' }}>46-60</option>
                        <option value="Above 60" {{ old('age_group') == 'Above 60' ? 'selected' : '' }}>Above 60</option>
                    </select>
                </div>
            </div>

            <!-- Civil Status & Nationality -->
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-700 font-medium">Civil Status</label>
                    <select name="civil_status" class="form-input w-full mt-2 p-3 rounded-xl" required>
                        <option value="">Select Civil Status</option>
                        <option value="Single" {{ old('civil_status') == 'Single' ? 'selected' : '' }}>Single</option>
                        <option value="Married" {{ old('civil_status') == 'Married' ? 'selected' : '' }}>Married</option>
                        <option value="Widowed" {{ old('civil_status') == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                        <option value="Separated" {{ old('civil_status') == 'Separated' ? 'selected' : '' }}>Separated</option>
                        <option value="Divorced" {{ old('civil_status') == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium">Nationality</label>
                    <input type="text" name="nationality" value="{{ old('nationality', 'Filipino') }}" class="form-input w-full mt-2 p-3 rounded-xl" required>
                </div>
            </div>

            <!-- Education & Sector Group -->
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-700 font-medium">Highest Educational Background</label>
                    <select name="education" class="form-input w-full mt-2 p-3 rounded-xl" required>
                        <option value="">Select</option>
                        <option value="High School" {{ old('education') == 'High School' ? 'selected' : '' }}>High School</option>
                        <option value="Vocational" {{ old('education') == 'Vocational' ? 'selected' : '' }}>Vocational</option>
                        <option value="College" {{ old('education') == 'College' ? 'selected' : '' }}>College</option>
                        <option value="Graduate Studies" {{ old('education') == 'Graduate Studies' ? 'selected' : '' }}>Graduate Studies</option>
                        <option value="Postgraduate" {{ old('education') == 'Postgraduate' ? 'selected' : '' }}>Postgraduate</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium">Sector Group</label>
                    <select name="sector_group" class="form-input w-full mt-2 p-3 rounded-xl" required>
                        <option value="">Select Sector</option>
                        <option value="Government" {{ old('sector_group') == 'Government' ? 'selected' : '' }}>Government</option>
                        <option value="Private" {{ old('sector_group') == 'Private' ? 'selected' : '' }}>Private</option>
                        <option value="NGO" {{ old('sector_group') == 'NGO' ? 'selected' : '' }}>NGO</option>
                        <option value="Academia" {{ old('sector_group') == 'Academia' ? 'selected' : '' }}>Academia</option>
                    </select>
                </div>
            </div>

            <!-- Checkboxes -->
            <div class="flex space-x-4">
                <label class="inline-flex items-center checkbox-item p-2 border rounded-xl cursor-pointer">
                    <input type="checkbox" name="senior_citizen" value="1" {{ old('senior_citizen') ? 'checked' : '' }} class="form-checkbox">
                    <span class="ml-2">Senior Citizen</span>
                </label>
                <label class="inline-flex items-center checkbox-item p-2 border rounded-xl cursor-pointer">
                    <input type="checkbox" name="differently_abled" value="1" {{ old('differently_abled') ? 'checked' : '' }} class="form-checkbox">
                    <span class="ml-2">Differently Abled</span>
                </label>
                <label class="inline-flex items-center checkbox-item p-2 border rounded-xl cursor-pointer">
                    <input type="checkbox" name="solo_parent" value="1" {{ old('solo_parent') ? 'checked' : '' }} class="form-checkbox">
                    <span class="ml-2">Solo Parent</span>
                </label>
            </div>

            <!-- Region, Province, City -->
            <div class="flex space-x-4">
                <div class="flex-1">
                    <label class="block text-gray-700 font-medium">Region</label>
                    <select name="region" class="form-input w-full mt-2 p-3 rounded-xl" required>
                        <option value="">Select Region</option>
                        <option value="NCR" {{ old('region') == 'NCR' ? 'selected' : '' }}>NCR</option>
                        <option value="CAR" {{ old('region') == 'CAR' ? 'selected' : '' }}>CAR</option>
                        <option value="Region I (Ilocos Region)" {{ old('region') == 'Region I (Ilocos Region)' ? 'selected' : '' }}>Region I</option>
                        <option value="Region II (Cagayan Valley)" {{ old('region') == 'Region II (Cagayan Valley)' ? 'selected' : '' }}>Region II</option>
                        <option value="Region III (Central Luzon)" {{ old('region') == 'Region III (Central Luzon)' ? 'selected' : '' }}>Region III</option>
                        <option value="Region IV-A (CALABARZON)" {{ old('region') == 'Region IV-A (CALABARZON)' ? 'selected' : '' }}>Region IV-A</option>
                        <option value="Region IV-B (MIMAROPA)" {{ old('region') == 'Region IV-B (MIMAROPA)' ? 'selected' : '' }}>Region IV-B</option>
                        <option value="Region V (Bicol Region)" {{ old('region') == 'Region V (Bicol Region)' ? 'selected' : '' }}>Region V</option>
                        <option value="Region VI (Western Visayas)" {{ old('region') == 'Region VI (Western Visayas)' ? 'selected' : '' }}>Region VI</option>
                        <option value="Region VII (Central Visayas)" {{ old('region') == 'Region VII (Central Visayas)' ? 'selected' : '' }}>Region VII</option>
                        <option value="Region VIII (Eastern Visayas)" {{ old('region') == 'Region VIII (Eastern Visayas)' ? 'selected' : '' }}>Region VIII</option>
                        <option value="Region IX (Zamboanga Peninsula)" {{ old('region') == 'Region IX (Zamboanga Peninsula)' ? 'selected' : '' }}>Region IX</option>
                        <option value="Region X (Northern Mindanao)" {{ old('region') == 'Region X (Northern Mindanao)' ? 'selected' : '' }}>Region X</option>
                        <option value="Region XI (Davao Region)" {{ old('region') == 'Region XI (Davao Region)' ? 'selected' : '' }}>Region XI</option>
                        <option value="Region XII (SOCCSKSARGEN)" {{ old('region') == 'Region XII (SOCCSKSARGEN)' ? 'selected' : '' }}>Region XII</option>
                        <option value="Region XIII (Caraga)" {{ old('region') == 'Region XIII (Caraga)' ? 'selected' : '' }}>Region XIII</option>
                        <option value="BARMM" {{ old('region') == 'BARMM' ? 'selected' : '' }}>BARMM</option>
                        <option value="Region IV-C (Palawan)" {{ old('region') == 'Region IV-C (Palawan)' ? 'selected' : '' }}>Region IV-C</option>
                    </select>
                </div>

                <div class="w-1/3">
                    <label class="block text-gray-700 font-medium">Province</label>
                    <input type="text" name="province" value="{{ old('province') }}" class="form-input w-full mt-2 p-3 rounded-xl" required>
                </div>

                <div class="w-1/3">
                    <label class="block text-gray-700 font-medium">City / Municipality</label>
                    <input type="text" name="city" value="{{ old('city') }}" class="form-input w-full mt-2 p-3 rounded-xl" required>
                </div>
            </div>

            <!-- Agency, Office, Designation -->
            <div>
                <label class="block text-gray-700 font-medium">Agency</label>
                <input type="text" name="agency" value="{{ old('agency') }}" class="form-input w-full mt-2 p-3 rounded-xl" required>
            </div>

            <div class="flex space-x-4">
                <div class="w-1/2">
                    <label class="block text-gray-700 font-medium">Office Affiliation</label>
                    <input type="text" name="office_affiliation" value="{{ old('office_affiliation') }}" class="form-input w-full mt-2 p-3 rounded-xl" required>
                </div>
                <div class="w-1/2">
                    <label class="block text-gray-700 font-medium">Designation</label>
                    <input type="text" name="designation" value="{{ old('designation') }}" class="form-input w-full mt-2 p-3 rounded-xl" required>
                </div>
            </div>

            <div class="text-right mt-4">
                <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition font-semibold">
                    Next <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </div>
        </form>
<!-- Footer -->
<div class="text-center mt-6">
    <p class="text-white text-600 text-sm">
        Already have an account?
        <a href="{{ route('login') }}" class="text-black-600 font-semibold hover:underline">Login</a>
    </p>
</div>

        <div class="text-center mt-6 text-white">
            <p class="text-sm opacity-75">Powered by DICT - Department of Information and Communications Technology</p>
        </div>
    </div>
</div>
@endsection