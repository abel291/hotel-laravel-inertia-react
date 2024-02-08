@props(['amenities' => []])
<div {{ $attributes->merge(['class' => 'flex flex-wrap gap-2.5']) }}>
    @foreach ($amenities as $amenity)
        <img alt="{{ $amenity->name }}" title="{{ $amenity->name }}" src="{{ $amenity->icon }}" class='w-6 h-6' />
    @endforeach
</div>
