@props(['title', 'description'])

<div class="px-4 py-3 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-0">
    <dt class="text-sm font-medium leading-6 text-gray-900">{{ $title }}</dt>
    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-3 sm:mt-0">{{ $description }}</dd>
</div>
