<x-layout>
    <x-slot:heading>
        Job Details: {{ $job->title }} 📄
    </x-slot:heading>

    <h2 class="font-bold text-2xl mb-2">{{ $job->title }}</h2>
    <p class="text-lg text-gray-700 mb-4">{{ $job->description }}</p>
    
    <div class="mb-2">
        <strong>📍 Location:</strong> {{ $job->location }}
    </div>
    <div class="mb-2">
        <strong>💰 Salary:</strong> ${{ number_format($job->salary, 2) }} per year.
    </div>
    <div class="mb-4">
        {{-- Accessing employer's name from the eager-loaded relationship --}}
        <strong>🏢 Company:</strong> {{ $job->employer->name }} 
    </div>
    <div class="text-sm text-gray-500">
            Posted on {{ $job->created_at->format('F j, Y') }} by {{ $job->employer->name }}
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
        <div class="text-sm text-gray-500">
            <a href="/jobs" class="text-blue-500 hover:underline">&laquo; Back to Job Listings</a>
        </div>
        <div class="mt-2 sm:mt-0">
            <x-button href="/jobs/{{ $job->id }}/edit">
                Edit Job
            </x-button>
        </div>
    </div>
</x-layout>