@extends('layouts.adminNav')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-2">
                Events Management
            </h1>
            <p class="text-gray-600">Manage and monitor all training events in the system</p>
        </div>
        <a href="{{ route('admin.events.createEvents') }}" 
           class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold py-3 px-6 rounded-lg hover:from-indigo-700 hover:to-purple-700 transition duration-300 transform hover:scale-105 flex items-center mt-4 sm:mt-0">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Create New Event
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-lg mb-6 shadow-sm animate-fade-in">
            <div class="flex items-center">
                <div class="bg-green-100 p-2 rounded-full mr-3">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-green-800 font-medium">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white p-6 rounded-2xl shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm">Total Events</p>
                    <h3 class="text-2xl font-bold">{{ $trainings->total() }}</h3>
                </div>
                <div class="bg-white/20 p-3 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-green-500 to-green-600 text-white p-6 rounded-2xl shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm">Upcoming Events</p>
                    <h3 class="text-2xl font-bold">{{ $upcomingCount ?? 0 }}</h3>
                </div>
                <div class="bg-white/20 p-3 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-purple-500 to-purple-600 text-white p-6 rounded-2xl shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-100 text-sm">Ongoing Events</p>
                    <h3 class="text-2xl font-bold">{{ $ongoingCount ?? 0 }}</h3>
                </div>
                <div class="bg-white/20 p-3 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-gray-500 to-gray-600 text-white p-6 rounded-2xl shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-100 text-sm">Completed Events</p>
                    <h3 class="text-2xl font-bold">{{ $completedCount ?? 0 }}</h3>
                </div>
                <div class="bg-white/20 p-3 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Filter Section -->
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
        <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
            <div class="relative w-full md:w-64">
                <input type="text" id="searchInput" placeholder="Search events..." 
                       class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            
            <div class="flex gap-4 w-full md:w-auto">
                <select id="statusFilter" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">All Status</option>
                    <option value="upcoming">Upcoming</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="completed">Completed</option>
                </select>
                
                <select id="platformFilter" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">All Platforms</option>
                    <option value="Zoom">Zoom</option>
                    <option value="Google Meet">Google Meet</option>
                    <option value="Microsoft Teams">Microsoft Teams</option>
                    <option value="Webex">Webex</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Events Table -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white">
                        <th class="px-6 py-4 text-left font-semibold">Course Title</th>
                        <th class="px-6 py-4 text-left font-semibold">Platform</th>
                        <th class="px-6 py-4 text-left font-semibold">Instructor</th>
                        <th class="px-6 py-4 text-left font-semibold">Schedule</th>
                        <th class="px-6 py-4 text-left font-semibold">Status</th>
                        <th class="px-6 py-4 text-left font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($trainings as $training)
                    @php
                        $startDate = \Carbon\Carbon::parse($training->start_date);
                        $endDate = \Carbon\Carbon::parse($training->end_date);
                        $today = \Carbon\Carbon::today();
                        
                        if ($today->between($startDate, $endDate)) {
                            $status = 'ongoing';
                            $statusColor = 'bg-yellow-100 text-yellow-800';
                            $statusText = 'Ongoing';
                        } elseif ($today->lt($startDate)) {
                            $status = 'upcoming';
                            $statusColor = 'bg-blue-100 text-blue-800';
                            $statusText = 'Upcoming';
                        } else {
                            $status = 'completed';
                            $statusColor = 'bg-green-100 text-green-800';
                            $statusText = 'Completed';
                        }
                    @endphp
                    <tr class="hover:bg-gray-50 transition duration-150 event-row" data-title="{{ strtolower($training->course_title) }}" data-status="{{ $status }}" data-platform="{{ strtolower($training->platform_used) }}">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="bg-indigo-100 p-2 rounded-lg mr-3">
                                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-medium text-gray-900">{{ $training->course_title }}</div>
                                    <div class="text-sm text-gray-500">{{ $training->category->category_name ?? 'Uncategorized' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                                {{ $training->platform_used }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">{{ $training->resource_person }}</div>
                            <div class="text-sm text-gray-500">{{ $training->level }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">{{ $startDate->format('M d, Y') }}</div>
                            <div class="text-sm text-gray-500">to {{ $endDate->format('M d, Y') }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $statusColor }}">
                                {{ $statusText }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.editEvents', $training->id) }}" 
                                   class="text-indigo-600 hover:text-indigo-900 p-2 rounded-lg hover:bg-indigo-50 transition duration-200"
                                   title="Edit Event">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                
                                <button onclick="confirmDelete({{ $training->id }})"
                                        class="text-red-600 hover:text-red-900 p-2 rounded-lg hover:bg-red-50 transition duration-200"
                                        title="Delete Event">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                                
                                <a href="#" 
                                   class="text-green-600 hover:text-green-900 p-2 rounded-lg hover:bg-green-50 transition duration-200"
                                   title="View Details">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Empty State -->
        @if($trainings->isEmpty())
        <div class="text-center py-12">
            <svg class="w-16 h-16 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h3 class="mt-4 text-lg font-medium text-gray-900">No events found</h3>
            <p class="mt-2 text-gray-500">Get started by creating your first event.</p>
            <a href="{{ route('admin.createEvents') }}" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                Create Event
            </a>
        </div>
        @endif
    </div>

    <!-- Pagination -->
    @if($trainings->hasPages())
    <div class="mt-6 bg-white rounded-2xl shadow-lg p-4">
        <div class="flex items-center justify-between">
            <div class="text-sm text-gray-700">
                Showing {{ $trainings->firstItem() }} to {{ $trainings->lastItem() }} of {{ $trainings->total() }} results
            </div>
            <div class="flex space-x-2">
                {{ $trainings->links() }}
            </div>
        </div>
    </div>
    @endif
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-2xl p-6 max-w-md mx-4">
        <div class="flex items-center mb-4">
            <div class="bg-red-100 p-3 rounded-full mr-3">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900">Confirm Deletion</h3>
        </div>
        <p class="text-gray-600 mb-6">Are you sure you want to delete this event? This action cannot be undone.</p>
        <div class="flex justify-end space-x-3">
            <button onclick="closeModal()" class="px-4 py-2 text-gray-600 hover:text-gray-800 font-medium">Cancel</button>
            <form id="deleteForm" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 font-medium transition duration-200">
                    Delete Event
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    // Search and Filter functionality
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const platformFilter = document.getElementById('platformFilter');
        const eventRows = document.querySelectorAll('.event-row');

        function filterEvents() {
            const searchQuery = searchInput.value.toLowerCase().trim();
            const statusQuery = statusFilter.value.toLowerCase();
            const platformQuery = platformFilter.value.toLowerCase();

            eventRows.forEach(row => {
                const title = row.dataset.title;
                const status = row.dataset.status;
                const platform = row.dataset.platform;

                const matchesSearch = title.includes(searchQuery);
                const matchesStatus = statusQuery === '' || status === statusQuery;
                const matchesPlatform = platformQuery === '' || platform === platformQuery;

                if (matchesSearch && matchesStatus && matchesPlatform) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        searchInput.addEventListener('input', filterEvents);
        statusFilter.addEventListener('change', filterEvents);
        platformFilter.addEventListener('change', filterEvents);
    });

    // Delete confirmation modal
    function confirmDelete(eventId) {
        const form = document.getElementById('deleteForm');
        form.action = `{{ url('admin/events') }}/${eventId}`;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    // Close modal when clicking outside
    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
</script>

<style>
    .animate-fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .event-row {
        transition: all 0.2s ease;
    }
    
    .event-row:hover {
        transform: translateX(4px);
    }
</style>
@endsection