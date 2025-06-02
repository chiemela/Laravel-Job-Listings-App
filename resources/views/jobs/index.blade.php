<x-layout>
    <x-slot:heading>
        Job Listings 🎯
    </x-slot:heading>
    <div class="space-y-4">
        @if (count($jobs) > 0)
            @foreach ($jobs as $job_item)
            <a href="/jobs/{{ $job_item['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg hover:bg-gray-50">
                <div class="font-bold text-blue-500">{{ $job_item->employer->name }}</div>
                <div>
                    <strong>{{ $job_item['title'] }}:</strong> Pays ${{ number_format($job_item['salary'], 2) }} per year.
                </div>
            </a>
            @endforeach

            <div class="mt-6">
                {{ $jobs->links() }}
            </div>
        @else
            <p>No jobs found at the moment. Please check back later! ✨</p>
        @endif
    </div>
</x-layout>