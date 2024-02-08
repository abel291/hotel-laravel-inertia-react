@props(['beds' => []])
@foreach ($beds as $bed)
    <div class='flex items-center whitespace-nowrap'>
        <img src={{ $bed->icon }} class='w-6 h-6 mr-2 text-primary-800' />
        <span class='text-sm'>{{ $bed->pivot->quantity }} {{ $bed->name }}</span>
    </div>
@endforeach
