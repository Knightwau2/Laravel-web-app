<x-layout>
    <x-slot:heading>
        Post a New Job
    </x-slot:heading>

    <form method="POST" action="/jobs">
        @csrf
        <div class="space-y-4">
            <div>
                <label for="title" class="block font-medium">Job Title</label>
                <input type="text" id="title" name="title" required class="border rounded p-2 w-full">
            </div>
            
            <div>
                <label for="company" class="block font-medium">Company</label>
                <input type="text" id="company" name="company" required class="border rounded p-2 w-full">
            </div>
            
            <div>
                <label for="salary" class="block font-medium">Salary</label>
                <input type="number" id="salary" name="salary" required class="border rounded p-2 w-full">
            </div>
            
            <div>
                <label for="description" class="block font-medium">Description</label>
                <textarea id="description" name="description" required class="border rounded p-2 w-full" rows="4"></textarea>
            </div>
            
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                Post Job
            </button>
        </div>
    </form>
</x-layout>