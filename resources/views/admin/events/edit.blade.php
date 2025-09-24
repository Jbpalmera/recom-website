@extends('layouts.admindashboard')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold mb-6">Edit Event</h2>

    <form action="{{ route('admin.updateEvents', $training->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Course Title -->
        <div>
            <label class="block mb-1 font-medium">Course Title</label>
            <input type="text" name="course_title" value="{{ old('course_title', $training->course_title) }}" class="w-full border px-4 py-2 rounded">
            @error('course_title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Course Description -->
        <div>
            <label class="block mb-1 font-medium">Course Description</label>
            <textarea name="course_description" rows="4" class="w-full border px-4 py-2 rounded">{{ old('course_description', $training->course_description) }}</textarea>
            @error('course_description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Platform Used -->
        <div>
            <label class="block mb-1 font-medium">Platform Used</label>
            <input type="text" name="platform_used" value="{{ old('platform_used', $training->platform_used) }}" class="w-full border px-4 py-2 rounded">
            @error('platform_used') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Category & Level -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 font-medium">Category</label>
                <input type="text" name="category" value="{{ old('category', $training->category) }}" class="w-full border px-4 py-2 rounded">
                @error('category') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block mb-1 font-medium">Level</label>
                <select name="level" class="w-full border px-4 py-2 rounded">
                    <option value="">Select Level</option>
                    <option value="Beginner" {{ old('level', $training->level) == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                    <option value="Intermediate" {{ old('level', $training->level) == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                    <option value="Advanced" {{ old('level', $training->level) == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                </select>
                @error('level') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Start/End Date -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 font-medium">Start Date</label>
                <input type="date" name="start_date" value="{{ old('start_date', $training->start_date) }}" class="w-full border px-4 py-2 rounded">
                @error('start_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block mb-1 font-medium">End Date</label>
                <input type="date" name="end_date" value="{{ old('end_date', $training->end_date) }}" class="w-full border px-4 py-2 rounded">
                @error('end_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Start/End Time -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 font-medium">Start Time</label>
                <input type="time" name="start_time" value="{{ old('start_time', $training->start_time) }}" class="w-full border px-4 py-2 rounded">
                @error('start_time') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block mb-1 font-medium">End Time</label>
                <input type="time" name="end_time" value="{{ old('end_time', $training->end_time) }}" class="w-full border px-4 py-2 rounded">
                @error('end_time') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Resource Person -->
        <div>
            <label class="block mb-1 font-medium">Resource Person</label>
            <input type="text" name="resource_person" value="{{ old('resource_person', $training->resource_person) }}" class="w-full border px-4 py-2 rounded">
            @error('resource_person') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700 transition">Update Event</button>
    </form>
</div>
@endsection
