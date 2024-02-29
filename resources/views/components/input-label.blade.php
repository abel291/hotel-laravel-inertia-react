@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-neutral-700 dark:text-neutral-300 mb-2']) }}>
    {{ $value ?? $slot }}
</label>
