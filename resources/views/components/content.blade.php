<div
    {{ $attributes->merge(['class' => 'relative rounded-lg bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10']) }}>
    <div class="h-full w-full p-6 sm:px-8 sm:py-7">
        {{ $slot }}
    </div>
</div>
