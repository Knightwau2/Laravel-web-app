@props(['active' => false, 'type' => 'link'])

@if($type === 'button')
    <button {{ $attributes->merge(['type' => 'button']) }} class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">
        {{ $slot }}
    </button>
@else
    <a {{ $attributes->merge(['class' => $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white']) }} 
       class="rounded-md px-3 py-2 text-sm font-medium"
       aria-current="{{ $active ? 'page' : 'false' }}">
        {{ $slot }}
    </a>
@endif