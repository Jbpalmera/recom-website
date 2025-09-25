@extends('layouts.adminNav')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-6">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-2">Dashboard Overview</h1>
            <p class="text-gray-600">Welcome back! Here's what's happening with your courses today.</p>
        </div>

        <!-- Quick Actions Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold text-gray-800">245</span>
                </div>
                <h3 class="font-semibold text-gray-800 mb-2">Total Courses</h3>
                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200">
                    Create Course
                </button>
            </div>

            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold text-gray-800">12</span>
                </div>
                <h3 class="font-semibold text-gray-800 mb-2">Platform Links</h3>
                <button class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200">
                    Create Link
                </button>
            </div>

            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold text-gray-800">1,847</span>
                </div>
                <h3 class="font-semibold text-gray-800 mb-2">Total Participants</h3>
                <button class="w-full bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200">
                    View All
                </button>
            </div>

            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold text-gray-800">23</span>
                </div>
                <h3 class="font-semibold text-gray-800 mb-2">Categories</h3>
                <button class="w-full bg-orange-600 hover:bg-orange-700 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200">
                    Manage
                </button>
            </div>
        </div>

        <!-- Participants by Category Chart -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 mb-8">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Participants by Category</h2>
                    <p class="text-gray-600">Distribution of participants across different technology categories</p>
                </div>
                <div class="flex gap-2">
                    <button class="px-4 py-2 text-sm text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-lg transition-colors duration-200">Last 7 days</button>
                    <button class="px-4 py-2 text-sm bg-blue-600 text-white rounded-lg">Last 30 days</button>
                </div>
            </div>
            
            <div class="h-96">
                <canvas id="participantsChart"></canvas>
            </div>
        </div>

        <!-- Category Grid -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Course Categories</h2>
                <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200">
                    Add Category
                </button>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                @php
                    $categories = [
                        ['name' => 'AI & Machine Learning', 'participants' => 234, 'color' => 'bg-blue-500', 'icon' => '🤖'],
                        ['name' => 'AI & Creative Arts', 'participants' => 156, 'color' => 'bg-purple-500', 'icon' => '🎨'],
                        ['name' => 'Web Development', 'participants' => 298, 'color' => 'bg-green-500', 'icon' => '💻'],
                        ['name' => 'Mobile Development', 'participants' => 187, 'color' => 'bg-blue-600', 'icon' => '📱'],
                        ['name' => 'Cybersecurity', 'participants' => 145, 'color' => 'bg-red-500', 'icon' => '🔒'],
                        ['name' => 'Cloud Computing', 'participants' => 201, 'color' => 'bg-sky-500', 'icon' => '☁️'],
                        ['name' => 'Cloud Security', 'participants' => 89, 'color' => 'bg-indigo-500', 'icon' => '🛡️'],
                        ['name' => 'Data Science', 'participants' => 176, 'color' => 'bg-emerald-500', 'icon' => '📊'],
                        ['name' => 'Data Analytics', 'participants' => 123, 'color' => 'bg-teal-500', 'icon' => '📈'],
                        ['name' => 'UI/UX Design', 'participants' => 167, 'color' => 'bg-pink-500', 'icon' => '🎯'],
                        ['name' => 'Blockchain', 'participants' => 92, 'color' => 'bg-yellow-500', 'icon' => '⛓️'],
                        ['name' => 'DevOps', 'participants' => 134, 'color' => 'bg-orange-500', 'icon' => '⚙️'],
                        ['name' => 'Database', 'participants' => 98, 'color' => 'bg-gray-500', 'icon' => '🗄️'],
                        ['name' => 'Computer Engineering', 'participants' => 78, 'color' => 'bg-slate-500', 'icon' => '🔧'],
                        ['name' => 'Electronics Engineering', 'participants' => 65, 'color' => 'bg-amber-500', 'icon' => '⚡'],
                        ['name' => 'IoT Technology', 'participants' => 87, 'color' => 'bg-cyan-500', 'icon' => '🌐'],
                        ['name' => 'IT Fundamentals', 'participants' => 156, 'color' => 'bg-lime-500', 'icon' => '💡'],
                        ['name' => 'Graphic Design', 'participants' => 143, 'color' => 'bg-rose-500', 'icon' => '🖌️'],
                        ['name' => 'Women in Tech', 'participants' => 89, 'color' => 'bg-fuchsia-500', 'icon' => '👩‍💻'],
                        ['name' => 'Finance', 'participants' => 76, 'color' => 'bg-green-600', 'icon' => '💰'],
                        ['name' => 'Education', 'participants' => 112, 'color' => 'bg-blue-700', 'icon' => '📚'],
                        ['name' => 'Security', 'participants' => 98, 'color' => 'bg-red-600', 'icon' => '🛡️'],
                        ['name' => 'Computer Basics', 'participants' => 134, 'color' => 'bg-gray-600', 'icon' => '💾']
                    ];
                @endphp

                @foreach($categories as $category)
                <div class="bg-gradient-to-br from-white to-gray-50 border border-gray-200 rounded-xl p-4 hover:shadow-md transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-10 h-10 {{ $category['color'] }} rounded-lg flex items-center justify-center text-white font-semibold">
                            {{ $category['icon'] }}
                        </div>
                        <span class="text-xs text-gray-500">{{ $category['participants'] }} participants</span>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm mb-2 leading-tight">{{ $category['name'] }}</h3>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="{{ $category['color'] }} h-2 rounded-full" style="width: {{ min(100, ($category['participants'] / 300) * 100) }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('participantsChart').getContext('2d');
    
    const categoryData = [
        { name: 'Web Development', participants: 298 },
        { name: 'AI & Machine Learning', participants: 234 },
        { name: 'Cloud Computing', participants: 201 },
        { name: 'Mobile Development', participants: 187 },
        { name: 'Data Science', participants: 176 },
        { name: 'UI/UX Design', participants: 167 },
        { name: 'AI & Creative Arts', participants: 156 },
        { name: 'IT Fundamentals', participants: 156 },
        { name: 'Cybersecurity', participants: 145 },
        { name: 'Graphic Design', participants: 143 },
        { name: 'DevOps', participants: 134 },
        { name: 'Computer Basics', participants: 134 },
        { name: 'Data Analytics', participants: 123 },
        { name: 'Education', participants: 112 },
        { name: 'Database', participants: 98 },
        { name: 'Security', participants: 98 },
        { name: 'Blockchain', participants: 92 },
        { name: 'Women in Tech', participants: 89 },
        { name: 'Cloud Security', participants: 89 },
        { name: 'IoT Technology', participants: 87 },
        { name: 'Computer Engineering', participants: 78 },
        { name: 'Finance', participants: 76 },
        { name: 'Electronics Engineering', participants: 65 }
    ];

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: categoryData.slice(0, 10).map(item => item.name),
            datasets: [{
                label: 'Participants',
                data: categoryData.slice(0, 10).map(item => item.participants),
                backgroundColor: [
                    '#3B82F6', '#8B5CF6', '#10B981', '#2563EB', '#059669',
                    '#EC4899', '#7C3AED', '#84CC16', '#EF4444', '#F59E0B'
                ],
                borderColor: [
                    '#2563EB', '#7C3AED', '#059669', '#1D4ED8', '#047857',
                    '#DB2777', '#6D28D9', '#65A30D', '#DC2626', '#D97706'
                ],
                borderWidth: 2,
                borderRadius: 8,
                borderSkipped: false,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    titleColor: 'white',
                    bodyColor: 'white',
                    borderColor: 'rgba(255, 255, 255, 0.1)',
                    borderWidth: 1,
                    cornerRadius: 8,
                    displayColors: false,
                    callbacks: {
                        title: function(context) {
                            return context[0].label;
                        },
                        label: function(context) {
                            return `${context.parsed.y} participants`;
                        }
                    }
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#6B7280',
                        font: {
                            size: 12
                        },
                        maxRotation: 45
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(107, 114, 128, 0.1)'
                    },
                    ticks: {
                        color: '#6B7280',
                        font: {
                            size: 12
                        }
                    }
                }
            },
            animation: {
                duration: 1000,
                easing: 'easeInOutQuart'
            }
        }
    });
});
</script>

@endsection