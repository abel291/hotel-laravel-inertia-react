@props(['title', 'description'])

<div class="px-4 py-2.5 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-0">
    <dt class="text-sm font-medium leading-6 text-neutral-900 dark:text-neutral-200">{{ $title }}</dt>
    <dd class="mt-1 text-sm leading-6 text-neutral-700 dark:text-neutral-300 sm:col-span-3 sm:mt-0">{{ $description }}
    </dd>
</div>
