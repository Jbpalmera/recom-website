@extends('layouts.dashboard')

@section('content')
    <div class="max-w-6xl mx-auto p-6 bg-white rounded-2xl shadow-lg">
        <div class="flex items-center mb-6">
            <div class="p-3 rounded-full bg-gradient-to-r from-indigo-100 to-purple-100 mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <h2 class="text-3xl font-bold text-gray-800">My Profile</h2>
        </div>

        @if (session('success'))
            <div class="p-4 mb-6 rounded-lg flex items-center bg-green-50 text-green-800 border border-green-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" id="profile-form">
            @csrf

            <!-- Tabs -->
            <div class="mb-6 border-b border-gray-200">
                <nav class="-mb-px flex space-x-8">
                    <button type="button"
                        class="tab-link text-gray-600 hover:text-indigo-600 py-4 px-1 border-b-2 border-transparent font-medium text-sm focus:outline-none flex items-center"
                        data-tab="personal">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Personal Information
                    </button>
                    <button type="button"
                        class="tab-link text-gray-600 hover:text-indigo-600 py-4 px-1 border-b-2 border-transparent font-medium text-sm focus:outline-none flex items-center"
                        data-tab="address">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Address Information
                    </button>
                    <button type="button"
                        class="tab-link text-gray-600 hover:text-indigo-600 py-4 px-1 border-b-2 border-transparent font-medium text-sm focus:outline-none flex items-center"
                        data-tab="agency">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        Contact / Agency Info
                    </button>
                </nav>
            </div>

            <!-- Tab Contents -->
            <div>
                <!-- Personal Information -->
                <div class="tab-content" id="personal">
                    <div class="flex flex-col md:flex-row gap-8">
                        <!-- Left Side: Profile Picture -->
                        <div class="md:w-1/3 flex flex-col items-center">
                            <div class="relative mb-4">
                                @if ($user->profile_picture)
                                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture"
                                        class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg">
                                @else
                                    <div class="w-32 h-32 rounded-full flex items-center justify-center text-white text-4xl font-bold border-4 border-white shadow-lg"
                                        style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                        {{ strtoupper(substr($user->first_name, 0, 1)) }}
                                    </div>
                                @endif
                                <div class="absolute -bottom-2 -right-2 bg-indigo-600 rounded-full p-2 shadow-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                            </div>

                            <label class="relative cursor-pointer">
                                <input type="file" name="profile_picture" class="hidden" id="profile-picture-input">
                                <span class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white text-sm font-medium rounded-lg hover:from-indigo-700 hover:to-purple-700 transition shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                    </svg>
                                    Change Photo
                                </span>
                            </label>
                            <p class="text-xs text-gray-500 mt-2 text-center">JPG, PNG or GIF, Max 2MB</p>
                        </div>

                        <!-- Right Side: Personal Info Fields -->
                        <div class="md:w-2/3 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Name Fields -->
                            <div>
                                <label class="block text-gray-700 font-medium mb-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    First Name
                                </label>
                                <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}"
                                    class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 transition">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Middle Initial</label>
                                <input type="text" name="middle_initial" maxlength="1"
                                    value="{{ old('middle_initial', $user->middle_initial) }}"
                                    class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 transition text-center uppercase">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Last Name</label>
                                <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}"
                                    class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 transition">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Extension</label>
                                <select name="name_extension"
                                    class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 transition">
                                    <option value="">None</option>
                                    <option value="Jr."
                                        {{ old('name_extension', $user->name_extension) == 'Jr.' ? 'selected' : '' }}>Jr.
                                    </option>
                                    <option value="Sr."
                                        {{ old('name_extension', $user->name_extension) == 'Sr.' ? 'selected' : '' }}>Sr.
                                    </option>
                                    <option value="III"
                                        {{ old('name_extension', $user->name_extension) == 'III' ? 'selected' : '' }}>III
                                    </option>
                                    <option value="IV"
                                        {{ old('name_extension', $user->name_extension) == 'IV' ? 'selected' : '' }}>IV
                                    </option>
                                </select>
                            </div>

                            <!-- Gender, Age, Civil Status, Nationality -->
                            <div>
                                <label class="block text-gray-700 font-medium mb-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                                    </svg>
                                    Gender
                                </label>
                                <select name="gender"
                                    class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 transition">
                                    <option value="">Select Gender</option>
                                    <option value="Male" {{ old('gender', $user->gender) == 'Male' ? 'selected' : '' }}>
                                        Male</option>
                                    <option value="Female"
                                        {{ old('gender', $user->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                                    <option value="Other" {{ old('gender', $user->gender) == 'Other' ? 'selected' : '' }}>
                                        Other</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Age Group
                                </label>
                                <select name="age_group"
                                    class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 transition">
                                    <option value="">Select Age Group</option>
                                    <option value="Below 18"
                                        {{ old('age_group', $user->age_group) == 'Below 18' ? 'selected' : '' }}>Below 18
                                    </option>
                                    <option value="18-25"
                                        {{ old('age_group', $user->age_group) == '18-25' ? 'selected' : '' }}>18-25
                                    </option>
                                    <option value="26-35"
                                        {{ old('age_group', $user->age_group) == '26-35' ? 'selected' : '' }}>26-35
                                    </option>
                                    <option value="36-45"
                                        {{ old('age_group', $user->age_group) == '36-45' ? 'selected' : '' }}>36-45
                                    </option>
                                    <option value="46-60"
                                        {{ old('age_group', $user->age_group) == '46-60' ? 'selected' : '' }}>46-60
                                    </option>
                                    <option value="Above 60"
                                        {{ old('age_group', $user->age_group) == 'Above 60' ? 'selected' : '' }}>Above 60
                                    </option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Civil Status</label>
                                <select name="civil_status"
                                    class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 transition">
                                    <option value="">Select Civil Status</option>
                                    <option value="Single"
                                        {{ old('civil_status', $user->civil_status) == 'Single' ? 'selected' : '' }}>Single
                                    </option>
                                    <option value="Married"
                                        {{ old('civil_status', $user->civil_status) == 'Married' ? 'selected' : '' }}>
                                        Married</option>
                                    <option value="Widowed"
                                        {{ old('civil_status', $user->civil_status) == 'Widowed' ? 'selected' : '' }}>
                                        Widowed</option>
                                    <option value="Separated"
                                        {{ old('civil_status', $user->civil_status) == 'Separated' ? 'selected' : '' }}>
                                        Separated</option>
                                    <option value="Divorced"
                                        {{ old('civil_status', $user->civil_status) == 'Divorced' ? 'selected' : '' }}>
                                        Divorced</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Nationality</label>
                                <input type="text" name="nationality"
                                    value="{{ old('nationality', $user->nationality) }}"
                                    class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 transition">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address Information -->
                <div class="tab-content hidden" id="address">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Region
                            </label>
                            <select name="region"
                                class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 transition">
                                <option value="">Select Region</option>
                                <option value="NCR" {{ old('region', $user->region) == 'NCR' ? 'selected' : '' }}>NCR</option>
                                <option value="CAR" {{ old('region', $user->region) == 'CAR' ? 'selected' : '' }}>CAR</option>
                                <option value="Region I (Ilocos Region)"
                                    {{ old('region', $user->region) == 'Region I (Ilocos Region)' ? 'selected' : '' }}>Region I
                                </option>
                                <option value="Region II (Cagayan Valley)"
                                    {{ old('region', $user->region) == 'Region II (Cagayan Valley)' ? 'selected' : '' }}>Region II
                                </option>
                                <option value="Region III (Central Luzon)"
                                    {{ old('region', $user->region) == 'Region III (Central Luzon)' ? 'selected' : '' }}>Region III
                                </option>
                                <option value="Region IV-A (CALABARZON)"
                                    {{ old('region', $user->region) == 'Region IV-A (CALABARZON)' ? 'selected' : '' }}>Region IV-A
                                </option>
                                <option value="Region IV-B (MIMAROPA)"
                                    {{ old('region', $user->region) == 'Region IV-B (MIMAROPA)' ? 'selected' : '' }}>Region IV-B
                                </option>
                                <option value="Region V (Bicol Region)"
                                    {{ old('region', $user->region) == 'Region V (Bicol Region)' ? 'selected' : '' }}>Region V
                                </option>
                                <option value="Region VI (Western Visayas)"
                                    {{ old('region', $user->region) == 'Region VI (Western Visayas)' ? 'selected' : '' }}>Region VI
                                </option>
                                <option value="Region VII (Central Visayas)"
                                    {{ old('region', $user->region) == 'Region VII (Central Visayas)' ? 'selected' : '' }}>Region VII
                                </option>
                                <option value="Region VIII (Eastern Visayas)"
                                    {{ old('region', $user->region) == 'Region VIII (Eastern Visayas)' ? 'selected' : '' }}>Region
                                    VIII
                                </option>
                                <option value="Region IX (Zamboanga Peninsula)"
                                    {{ old('region', $user->region) == 'Region IX (Zamboanga Peninsula)' ? 'selected' : '' }}>Region
                                    IX
                                </option>
                                <option value="Region X (Northern Mindanao)"
                                    {{ old('region', $user->region) == 'Region X (Northern Mindanao)' ? 'selected' : '' }}>Region X
                                </option>
                                <option value="Region XI (Davao Region)"
                                    {{ old('region', $user->region) == 'Region XI (Davao Region)' ? 'selected' : '' }}>Region XI
                                </option>
                                <option value="Region XII (SOCCSKSARGEN)"
                                    {{ old('region', $user->region) == 'Region XII (SOCCSKSARGEN)' ? 'selected' : '' }}>Region XII
                                </option>
                                <option value="Region XIII (Caraga)"
                                    {{ old('region', $user->region) == 'Region XIII (Caraga)' ? 'selected' : '' }}>Region XIII
                                </option>
                                <option value="BARMM" {{ old('region', $user->region) == 'BARMM' ? 'selected' : '' }}>BARMM</option>
                                <option value="Region IV-C (Palawan)"
                                    {{ old('region', $user->region) == 'Region IV-C (Palawan)' ? 'selected' : '' }}>Region IV-C
                                </option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Province</label>
                            <input type="text" name="province" value="{{ old('province', $user->province) }}"
                                class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 transition">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">City / Municipality</label>
                            <input type="text" name="city" value="{{ old('city', $user->city) }}"
                                class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 transition">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Barangay / Street</label>
                            <input type="text" name="barangay" value="{{ old('barangay', $user->barangay) }}"
                                class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 transition">
                        </div>
                    </div>
                </div>

                <!-- Agency / Contact Information -->
                <div class="tab-content hidden" id="agency">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                Agency
                            </label>
                            <input type="text" name="agency" value="{{ old('agency', $user->agency) }}"
                                class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 transition">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Office Affiliation</label>
                            <input type="text" name="office_affiliation"
                                value="{{ old('office_affiliation', $user->office_affiliation) }}"
                                class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 transition">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Designation</label>
                            <input type="text" name="designation"
                                value="{{ old('designation', $user->designation) }}"
                                class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 transition">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Email Address
                            </label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 transition">
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6 mt-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                Phone Number
                            </label>
                            <input type="tel" name="phone" value="{{ old('phone', $user->phone) }}"
                                class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 transition">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Alternate Contact</label>
                            <input type="text" name="alternate_contact" value="{{ old('alternate_contact', $user->alternate_contact) }}"
                                class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 transition">
                        </div>
                    </div>
                </div>

                <!-- Update Button -->
                <div class="text-right mt-8 pt-6 border-t border-gray-200">
                    <button type="submit"
                        class="inline-flex items-center text-white px-6 py-3 rounded-lg font-semibold
           bg-gradient-to-r from-indigo-600 to-purple-600
           hover:from-indigo-700 hover:to-purple-700 transition shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Update Profile
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Tabs Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabLinks = document.querySelectorAll('.tab-link');
            const tabContents = document.querySelectorAll('.tab-content');

            function showTab(tabId) {
                tabContents.forEach(tc => tc.classList.add('hidden'));
                tabLinks.forEach(tl => tl.classList.remove('border-indigo-600', 'text-indigo-600'));
                document.getElementById(tabId).classList.remove('hidden');
                document.querySelector(`.tab-link[data-tab="${tabId}"]`).classList.add('border-indigo-600',
                    'text-indigo-600');
            }

            showTab('personal');

            tabLinks.forEach(link => {
                link.addEventListener('click', () => showTab(link.dataset.tab));
            });

            // Profile picture preview
            const profilePictureInput = document.getElementById('profile-picture-input');
            if (profilePictureInput) {
                profilePictureInput.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const profilePicture = document.querySelector('.profile-picture');
                            if (profilePicture) {
                                profilePicture.src = e.target.result;
                            }
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
        });
    </script>
@endsection