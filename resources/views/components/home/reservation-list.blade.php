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
                $headList = ['Codigo', 'Estado', 'Fechas', 'Fechas de pago', 'Total'];
            @endphp
            <thead>
                <tr>
                    @foreach ($headList as $name)
                        <th>{{ $name }}</th>
                    @endforeach
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
                            <x-badge :color="$item->state->color()">{{ $item->state->text() }}</x-badge>
                        </td>

                        <td>
                            <div class="flex gap-x-4">
                                <div class=" text-sm font-medium">
                                    <span>
                                        {{ $item->start_date->isoFormat('DD MMM ') }}
                                    </span>
                                    al
                                    <span>
                                        {{ $item->end_date->isoFormat('DD MMM') }}
                                    </span>
                                </div>
                                <x-badge>{{ $item->nights }} noches</x-badge>
                            </div>

                        </td>
                        <td>
                            <x-date-format :date="$item->updated_at" />
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
