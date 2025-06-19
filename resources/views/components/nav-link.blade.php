@props(['active'])

@php
$classes = ($active ?? false)
            ? 'bg-teal-600 text-gray-50 px-5 py-3 rounded-3xl'
            : 'bg-gray-100 text-gray-700 px-5 py-3 rounded-3xl';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
