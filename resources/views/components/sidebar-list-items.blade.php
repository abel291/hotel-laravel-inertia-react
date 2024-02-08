@props(['itemsNavigation'])
<ul role="list" class="flex flex-col gap-1 flex-1">
    @foreach ($itemsNavigation as $data)
        <li>
            <x-sidebar-item :data="$data" />
        </li>
    @endforeach
</ul>
