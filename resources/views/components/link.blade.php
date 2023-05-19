@php
    $classes = "text-xs text-gray-500 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
@endphp

{{-- merge() une todo los attributos que le pases  --}}
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
