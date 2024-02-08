@props(['label' => ''])
@php
    $model = $attributes->whereStartsWith('wire:model')->first();
@endphp
<div>
    <x-input-label for="{{ $model }}">{{ $label ? $label : $slot }}</x-input-label>
    <x-text-input id="{{ $model }}" name="{{ $model }}" {{ $attributes }} />
    <x-input-error :messages="$errors->get($model)" />
</div>
