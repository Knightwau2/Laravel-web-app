<x-layout>
    <x-slot:heading>
        Edit Job: {{ $job->title }}
    </x-slot:heading>

    <form method="POST" action="/jobs/{{ $job->id }}">
        @csrf
        @method('PATCH')
        
        <div class="space-y-4">
            <div>
                <label for="title" class="block font-medium">Job Title</label>
                <input type="text" id="title" name="title" value="{{ $job->title }}" required class="border rounded p-2 w-full">
            </div>
            
            <div>
                <label for="company" class="block font-medium">Company</label>
                <input type="text" id="company" name="company" value="{{ $job->company }}" required class="border rounded p-2 w-full">
            </div>
            
            <div>
                <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="number" 
                           id="salary" 
                           name="salary" 
                           min="0" 
                           class="border rounded p-2 w-full"
                           value="{{ old('salary', $job->salary ?? '') }}"
                           placeholder="Optional">
                    @error('salary')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            
            <div>
                <label for="description" class="block font-medium">Description</label>
                <textarea id="description" name="description" required class="border rounded p-2 w-full" rows="4">{{ $job->description }}</textarea>
            </div>
            
            <div class="flex space-x-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                    Update Job
                </button>
                <a href="/jobs" class="bg-gray-500 text-white px-4 py-2 rounded">
                    Cancel
                </a>
            </div>
        </div>
    </form>
</x-layout>