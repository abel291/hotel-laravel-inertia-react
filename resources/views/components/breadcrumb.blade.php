@props(['data' => []])
<div
    class="flex gap-x-3 items-center text-sm font-medium text-gray-500 outline-none transition duration-75 hover:text-gray-700 focus-visible:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 dark:focus-visible:text-gray-200">
    @foreach ($data as $key => ['path' => $path, 'name' => $name])
        @if ($key)
            <x-lucide-chevron-right class="w-4 h-4" />
        @endif
        @if ($path)
            <a href="{{ $path }}">{{ $name }}</a>
        @else
            <span>{{ $name }}</span>
        @endif
    @endforeach

</div>
