@props(['data' => []])
<a href="{{ route($data['route']) }}"
    class="flex items-center gap-3 rounded-md px-3 py-2
    {{ request()->routeIs($data['routeActive'] . '*')
        ? 'bg-primary-800/80 text-white'
        : 'text-primary-200 hover:text-white hover:bg-primary-800' }}">

    @svg($data['icon'], 'w-5 h-5')
    <span class="text-sm font-medium leading-6 text-white ">
        {{ $data['title'] }}
    </span>
</a>
