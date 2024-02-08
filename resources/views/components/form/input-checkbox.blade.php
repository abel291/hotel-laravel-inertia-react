@props(['label' => ''])
@php
    $id = rand(1, 10000);
@endphp
<div class="flex items-start mt-2">
    <div class="flex h-5 items-center">
        <input id="{{ $id }}" type="checkbox" {{ $attributes->class('input-checkbox') }}>
    </div>

    <label for="{{ $id }}" class="ml-2 font-medium text-sm">
        {{ $label ? $label : $slot }}
    </label>
</div>
