@props(['label'])
<x-content>
    <div class=" text-neutral-900 dark:text-neutral-100 ">
        <dt class="text-neutral-500 font-medium text-sm">{{ $label }}</dt>
        <dd class="text-3xl text-neutral-900 tracking-tight font-semibold mt-1">
            {{ $slot }}
        </dd>
    </div>
</x-content>
