@props(['amenities' => []])
<div {{ $attributes->merge(['class' => 'flex flex-wrap gap-2']) }}>
    @foreach ($amenities as $amenity)
        <img alt="{{ $amenity->name }}" title="{{ $amenity->name }}" src="{{ $amenity->icon }}" class='w-5 h-5' />
    @endforeach
</div>
