@props(['img' => null, 'title' => null, 'subTitle' => null, 'path' => null])
<div class="flex items-center gap-x-4">
    @if ($img)
        <x-table.image :img="$img" />
    @endif
    @if ($title || $subTitle)
        <div>

            @if ($title)
                @if ($path)
                    <a class="font-medium" target='_blank' href={{ $path }}>
                        {{ $title }}
                    </a>
                @else
                    <div class="font-medium ">
                        {{ $title }}
                    </div>
                @endif
            @endif
            @if ($subTitle)
                <div class="mt-0.5 text-gray-700">
                    {{ $subTitle }}
                </div>
            @endif

        </div>
    @endif

</div>
