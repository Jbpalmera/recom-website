@extends('layouts.dashboard')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white rounded-2xl shadow-lg">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">My Profile</h2>

    @if(session('success'))
        <div class="p-4 bg-green-100 text-green-800 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" id="profile-form">
        @csrf

        <!-- Tabs -->
        <div class="mb-6 border-b border-gray-200">
            <nav class="-mb-px flex space-x-8">
                <button type="button" class="tab-link text-gray-600 hover:text-indigo-600 py-4 px-1 border-b-2 border-transparent font-medium text-sm focus:outline-none" data-tab="personal">
                    Personal Information
                </button>
                <button type="button" class="tab-link text-gray-600 hover:text-indigo-600 py-4 px-1 border-b-2 border-transparent font-medium text-sm focus:outline-none" data-tab="address">
                    Address Information
                </button>
                <button type="button" class="tab-link text-gray-600 hover:text-indigo-600 py-4 px-1 border-b-2 border-transparent font-medium text-sm focus:outline-none" data-tab="agency">
                    Contact / Agency Info
                </button>
            </nav>
        </div>

        <!-- Tab Contents -->
        <div>
            <!-- Personal Information -->
            <div class="tab-content" id="personal">
                <div class="grid md:grid-cols-1 gap-6">
                    <!-- Profile Picture & Names -->
                    <div class="flex flex-col md:flex-row gap-6 items-center">
                        <div class="flex flex-col items-center">
                            <img src="{{ $user->profile_picture ? asset('storage/'.$user->profile_picture) : asset('images/default-profile.png') }}" 
                                 alt="Profile Picture" class="w-32 h-32 rounded-full object-cover mb-4 border-2 border-indigo-600">
                            <input type="file" name="profile_picture"
                                   class="text-sm text-gray-600 file:bg-indigo-600 file:text-white file:rounded-lg file:px-4 file:py-2 file:border-0 file:cursor-pointer hover:file:bg-indigo-700">
                        </div>

                        <div class="flex flex-wrap gap-4 flex-1">
                            <div class="flex-1 min-w-[150px]">
                                <label class="block text-gray-700 font-medium mb-2">First Name</label>
                                <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-0">
                            </div>
                            <div class="w-24">
                                <label class="block text-gray-700 font-medium mb-2">Middle Initial</label>
                                <input type="text" name="middle_initial" maxlength="1" value="{{ old('middle_initial', $user->middle_initial) }}" class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-0">
                            </div>
                            <div class="flex-1 min-w-[150px]">
                                <label class="block text-gray-700 font-medium mb-2">Last Name</label>
                                <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-0">
                            </div>
                            <div class="w-24">
                                <label class="block text-gray-700 font-medium mb-2">Extension</label>
                                <select name="name_extension" class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-0">
                                    <option value="">None</option>
                                    <option value="Jr." {{ old('name_extension', $user->name_extension) == 'Jr.' ? 'selected' : '' }}>Jr.</option>
                                    <option value="Sr." {{ old('name_extension', $user->name_extension) == 'Sr.' ? 'selected' : '' }}>Sr.</option>
                                    <option value="III" {{ old('name_extension', $user->name_extension) == 'III' ? 'selected' : '' }}>III</option>
                                    <option value="IV" {{ old('name_extension', $user->name_extension) == 'IV' ? 'selected' : '' }}>IV</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Personal Details -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Gender</label>
                            <select name="gender" class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-0">
                                <option value="">Select Gender</option>
                                <option value="Male" {{ old('gender', $user->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender', $user->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Other" {{ old('gender', $user->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Age Group</label>
                            <select name="age_group" class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-0">
                                <option value="">Select Age Group</option>
                                <option value="Below 18" {{ old('age_group', $user->age_group) == 'Below 18' ? 'selected' : '' }}>Below 18</option>
                                <option value="18-25" {{ old('age_group', $user->age_group) == '18-25' ? 'selected' : '' }}>18-25</option>
                                <option value="26-35" {{ old('age_group', $user->age_group) == '26-35' ? 'selected' : '' }}>26-35</option>
                                <option value="36-45" {{ old('age_group', $user->age_group) == '36-45' ? 'selected' : '' }}>36-45</option>
                                <option value="46-60" {{ old('age_group', $user->age_group) == '46-60' ? 'selected' : '' }}>46-60</option>
                                <option value="Above 60" {{ old('age_group', $user->age_group) == 'Above 60' ? 'selected' : '' }}>Above 60</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Civil Status</label>
                            <select name="civil_status" class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-0">
                                <option value="">Select Civil Status</option>
                                <option value="Single" {{ old('civil_status', $user->civil_status) == 'Single' ? 'selected' : '' }}>Single</option>
                                <option value="Married" {{ old('civil_status', $user->civil_status) == 'Married' ? 'selected' : '' }}>Married</option>
                                <option value="Widowed" {{ old('civil_status', $user->civil_status) == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                                <option value="Separated" {{ old('civil_status', $user->civil_status) == 'Separated' ? 'selected' : '' }}>Separated</option>
                                <option value="Divorced" {{ old('civil_status', $user->civil_status) == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Nationality</label>
                            <input type="text" name="nationality" value="{{ old('nationality', $user->nationality) }}" class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-0">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Address Information -->
            <div class="tab-content hidden" id="address">
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Region</label>
                        <select name="region" class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-0">
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
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Province</label>
                        <input type="text" name="province" value="{{ old('province', $user->province) }}" class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-0">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">City / Municipality</label>
                        <input type="text" name="city" value="{{ old('city', $user->city) }}" class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-0">
                    </div>
                   
                </div>
            </div>

            <!-- Agency / Contact Information -->
            <div class="tab-content hidden" id="agency">
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Agency</label>
                        <input type="text" name="agency" value="{{ old('agency', $user->agency) }}" class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-0">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Office Affiliation</label>
                        <input type="text" name="office_affiliation" value="{{ old('office_affiliation', $user->office_affiliation) }}" class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-0">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Designation</label>
                        <input type="text" name="designation" value="{{ old('designation', $user->designation) }}" class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-0">
                    </div>
                     <div>
                        <label class="block text-gray-700 font-medium mb-2">Email Address</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-0">
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-4 mt-4">
                   
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Phone Number</label>
                        <input type="tel" name="phone" value="{{ old('phone', $user->phone) }}" class="form-input w-full p-3 rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-0">
                    </div>
                    
                </div>
            </div>

            <!-- Update Button -->
            <div class="text-right mt-8 pt-6 border-t border-gray-200">
                <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition font-semibold">
                    Update Profile
                </button>
            </div>
        </div>
    </form>
</div>

<!-- Tabs Script -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const tabLinks = document.querySelectorAll('.tab-link');
    const tabContents = document.querySelectorAll('.tab-content');

    function showTab(tabId) {
        tabContents.forEach(tc => tc.classList.add('hidden'));
        tabLinks.forEach(tl => tl.classList.remove('border-indigo-600', 'text-indigo-600'));
        document.getElementById(tabId).classList.remove('hidden');
        document.querySelector(`.tab-link[data-tab="${tabId}"]`).classList.add('border-indigo-600', 'text-indigo-600');
    }

    showTab('personal');

    tabLinks.forEach(link => {
        link.addEventListener('click', () => showTab(link.dataset.tab));
    });
});
</script>
@endsection