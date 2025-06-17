@props(['value'])

<label {{ $attributes->merge(['class' => 'block uppercase font-bold text-sm text-gray-600']) }}>
    {{ $value ?? $slot }}
</label>
