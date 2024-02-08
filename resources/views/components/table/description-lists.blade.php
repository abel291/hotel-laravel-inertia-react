@props(['title' => '', 'img' => '', 'data'])
<div>
    @if ($title)
        <div class="px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 text-gray-900">{{ $title }}</h3>
        </div>
    @endif
    <div class="mt-2 border-t border-gray-100 flex items-center gap-x-4">
        @if ($img)
            <div>
                <img src="{{ $img }}" class="h-20 w-20 object-cover rounded-full" alt="img card">
            </div>
        @endif
        <dl class="divide-y divide-gray-100 text-gray-900">
            @foreach ($data as $key => $item)
                <div class="px-2 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium  ">{{ $key }}</dt>
                    <dd class="text-sm  text-gray-700 sm:col-span-2">{{ $item }}</dd>
                </div>
            @endforeach


        </dl>
    </div>
</div>
