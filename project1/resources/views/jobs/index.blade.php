<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>

    <div class="space-y-4">
        @foreach ($jobs as $job)
            <div class="border border-gray-200 rounded p-4">
                <h2 class="font-bold text-lg">{{ $job->title }}</h2>
                <p class="text-gray-600">{{ $job->company }}</p>
                <p class="text-gray-800">${{ number_format($job->salary, 2) }}</p>
                <p>{{ Str::limit($job->description, 200) }}</p>
                <a href="/jobs/{{ $job->id }}" class="text-blue-500 hover:underline">View Details</a>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        <a href="/jobs/create" class="bg-blue-500 text-white px-4 py-2 rounded">
            Post a New Job
        </a>
    </div>
</x-layout>