{{-- resources/views/components/toast.blade.php --}}
@props(['type' => 'success', 'message' => ''])

@php
    $styles = [
        'success' => 'bg-green-500 border-green-600',
        'error' => 'bg-red-500 border-red-600',
        'warning' => 'bg-yellow-500 border-yellow-600',
        'info' => 'bg-blue-500 border-blue-600'
    ];
    
    $icons = [
        'success' => '✓',
        'error' => '✕',
        'warning' => '⚠',
        'info' => 'ℹ'
    ];
@endphp

<div x-data="{ show: true }" 
     x-show="show" 
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform translate-y-2"
     x-transition:enter-end="opacity-100 transform translate-y-0"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 transform translate-y-0"
     x-transition:leave-end="opacity-0 transform translate-y-2"
     x-init="setTimeout(() => show = false, 4000)"
     class="fixed top-4 right-4 z-50 max-w-sm w-full">
    <div class="{{ $styles[$type] }} text-white px-6 py-4 rounded-lg shadow-lg flex items-center justify-between">
        <div class="flex items-center">
            <span class="text-lg font-bold mr-3">{{ $icons[$type] }}</span>
            <span class="font-medium">{{ $message }}</span>
        </div>
        <button @click="show = false" class="text-white hover:text-gray-200 ml-4">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
</div>