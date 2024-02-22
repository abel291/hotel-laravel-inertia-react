@props(['reservationsRecent'])

<x-content>
    <div class="flex items-center justify-between">
        <x-title>
            Reservaciones recientemente
        </x-title>

        <a class="font-medium text-primary-700 text-sm" href="{{ route('dashboard.reservations.index') }}">
            Ver mas
        </a>
    </div>
    <div class="mt-10">
        <table class="table-list w-full table-auto text-sm">
            @php
                $headList = ['Codigo', 'Habitacion', 'Estado', 'Fechas', 'Total'];
            @endphp
            <thead>
                <tr>
                <tr>
                    @foreach ($headList as $name)
                        <th>{{ $name }}</th>
                    @endforeach
                </tr>

                </tr>
            </thead>
            <tbody>
                @foreach ($reservationsRecent as $item)
                    <tr x-auto-animate.175ms>
                        <td>
                            <a href="{{ route('dashboard.reservations.show', $item->id) }}"
                                class="table-button-option flex items-center gap-x-2 whitespace-nowrap">
                                <x-table.title-image :title="'#' . $item->code" />
                            </a>
                        </td>
                        <td>
                            <x-table.title-image :title="$item->data->room->name" />
                        </td>
                        <td>
                            <x-badge :color="$item->state->color()">{{ $item->state->text() }}</x-badge>
                        </td>
                        <td>

                            <div>
                                <div class="flex items-center gap-x-3 text-sm">
                                    <span class=" text-green-600 font-medium">
                                        {{ $item->start_date->isoFormat('DD MMM ') }}
                                    </span>
                                    al
                                    <span class=" text-red-600 font-medium">
                                        {{ $item->end_date->isoFormat('DD MMM') }}
                                    </span>
                                </div>
                                <div class="text-neutral-600 text-xs mt-1">
                                    {{ $item->nights }} noches(s)
                                </div>
                            </div>

                        </td>
                        <td>
                            <span class="font-semibold text-{{ $item->state->color() }}-600 whitespace-nowrap">
                                @money($item->total)
                            </span>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-content>
