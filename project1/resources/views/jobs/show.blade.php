<x-layout>
    <x-slot:heading>
        Job Details
    </x-slot:heading>

    <div class="space-y-4">
        <h1 class="font-bold text-2xl">{{ $job->title }}</h1>
        <p class="text-gray-600">{{ $job->company }}</p>
        <p class="text-gray-800">${{ number_format($job->salary, 2) }}</p>
        <p class="whitespace-pre-wrap">{{ $job->description }}</p>
    </div>

    <div class="mt-6">
        <a href="/jobs" class="text-blue-500 hover:underline">Back to all jobs</a>
    </div>
</x-layout>