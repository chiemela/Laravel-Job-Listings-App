@props(['active' => false])

{{-- This component is used to create a navigation link. It accepts an 'active' prop to determine if the link is currently active. --}}

{{-- The link will have different styles based on whether it is active or not. --}}
{{-- If active, it will have a dark background and white text. --}}
{{-- If not active, it will have gray text and a hover effect that changes the background to gray and text to white. --}}

<a class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-base font-medium"
    aria-current="{{ $active ? 'page' : 'false' }}"
    {{ $attributes }}
>{{ $slot }}</a>