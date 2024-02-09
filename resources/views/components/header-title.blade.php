<h1 {!! $attributes->merge([
    'class' => 'text-2xl font-semibold tracking-tight text-gray-950 dark:text-white sm:text-3xl ',
]) !!}>
    {{ $slot }}
</h1>
