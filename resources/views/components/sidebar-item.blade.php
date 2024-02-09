@props(['data' => []])
@php
    $routeActive = request()->routeIs($data['routeActive']);
    $classIcon = 'w-6 h-6 ' . ($routeActive ? '' : 'text-gray-400 group-hover:text-primary-700 ');
@endphp
<a href="{{ route($data['route']) }}"
    class="group  flex items-center gap-3 rounded-md p-2
    {{ $routeActive ? ' text-primary-700 bg-gray-50 font-semibold' : 'text-gray-700 hover:text-primary-700 hover:bg-gray-50 font-medium' }}">

    @svg($data['icon'], $classIcon)
    <span class="text-sm  leading-6 ">
        {{ $data['title'] }}
    </span>
</a>
