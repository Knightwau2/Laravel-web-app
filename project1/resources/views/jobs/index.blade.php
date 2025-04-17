<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="space-y-4">
        @foreach ($jobs as $job)
            <div class="border border-gray-200 rounded p-4 relative">
                <div class="absolute top-2 right-2">
                    <a href="/jobs/{{ $job->id }}/edit" 
                       class="text-blue-500 hover:text-blue-700 text-sm font-medium">
                        Edit
                    </a>
                </div>
                
                <h2 class="font-bold text-lg">{{ $job->title }}</h2>
                <p class="text-gray-600">{{ $job->company }}</p>
                <p class="text-gray-800">${{ number_format($job->salary, 2) }}</p>
                <p>{{ Str::limit($job->description, 200) }}</p>
                
                <div class="flex justify-between items-center mt-4">
                    <a href="/jobs/{{ $job->id }}" class="text-blue-500 hover:underline">View Details</a>
                    
                    <form method="POST" action="/jobs/{{ $job->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="text-red-500 hover:text-red-700 text-sm font-medium"
                                onclick="return confirm('Are you sure you want to delete this job?')">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        <a href="/jobs/create" class="bg-blue-500 text-white px-4 py-2 rounded">
            Post a New Job
        </a>
    </div>
</x-layout>