@extends('layouts.admindashboard')


@section('content')
<div class="max-w-6xl mx-auto bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold mb-6">View Events</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full table-auto border-collapse">
        <thead>
            <tr class="bg-indigo-600 text-white">
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Course Title</th>
                <th class="px-4 py-2">Platform Used</th>
                <th class="px-4 py-2">Resource Person</th>
                <th class="px-4 py-2">Start Date</th>
                <th class="px-4 py-2">End Date</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trainings as $index => $training)
            <tr class="border-b">
                <td class="px-4 py-2">{{ $index + 1 }}</td>
                <td class="px-4 py-2">{{ $training->course_title }}</td>
                <td class="px-4 py-2">{{ $training->platform_used }}</td>
                <td class="px-4 py-2">{{ $training->resource_person }}</td>
                <td class="px-4 py-2">{{ $training->start_date }}</td>
                <td class="px-4 py-2">{{ $training->end_date }}</td>
                <td class="px-4 py-2 flex space-x-2">
                    <a href="{{ route('admin.editEvents', $training->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                    
                    <form action="{{ route('admin.deleteEvents', $training->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $trainings->links() }}
    </div>
</div>
@endsection
