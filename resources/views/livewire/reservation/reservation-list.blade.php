@section('title', $labelPlural)

<x-slot name="header">
    <div class="flex justify-between items-end">
        <div>
            <x-breadcrumb :data="[
                [
                    'path' => route('dashboard.rooms.index'),
                    'name' => $labelPlural,
                ],
                [
                    'path' => null,
                    'name' => 'Lista',
                ],
            ]" />
            <x-header-title class="mt-2">
                {{ $labelPlural }}
            </x-header-title>
        </div>

        {{-- <a href="{{ route('dashboard.rooms.create') }}" class="btn btn-primary">
            Agregar {{ $label }}
        </a> --}}
    </div>
</x-slot>
<div>

    <div class=" bg-white overflow-hidden rounded-lg border">
        <div class="flex justify-end gap-2 py-4 px-6">
            <x-form.input-search />
        </div>
        <x-table.table :data="$list" wire:target="search">
            @php
                $headList = ['Nombre', 'Fechas', 'Habitacion', 'Pago', 'Estado', 'opciones'];
            @endphp
            <x-table.table-head>
                @foreach ($headList as $name)
                    <x-table.th>{{ $name }}</x-table.th>
                @endforeach

            </x-table.table-head>
            <x-table.tbody>
                @foreach ($list as $item)
                    <x-table.tr>

                        <x-table.td>
                            <x-table.title-image :title="$item->data->user->name" :sub-title="$item->data->user->email" />
                        </x-table.td>
                        <x-table.td>
                            <div class="flex  gap-x-1">
                                <span>{{ $item->start_date->isoFormat('DD MMM ') }} </span>
                                <span>-</span>
                                <span>{{ $item->end_date->isoFormat('DD MMM') }} </span>
                            </div>
                            <x-badge class="mt-2">{{ $item->nights }} noche{{ $item->nights > 1 ? 's' : '' }}</x-badge>
                        </x-table.td>
                        <x-table.td>
                            <div class="flex flex-col gap-y-0.5">
                                <span class="font-medium">{{ $item->data->room->name }} </span>
                            </div>
                        </x-table.td>

                        <x-table.td>
                            <span class="font-medium whitespace-nowrap">
                                @money($item->total)
                            </span>
                        </x-table.td>
                        <x-table.td>
                            <x-badge :color="$item->state->color()">{{ $item->state->text() }}</x-badge>
                        </x-table.td>

                        <x-table.td>

                            <a href="{{ route('dashboard.reservations.show', $item->id) }}"
                                class="table-button-option flex items-center gap-x-2">
                                <x-lucide-eye class="w-4 h-4" />
                                Ver detales
                            </a>

                        </x-table.td>
                    </x-table.tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
    </div>
</div>
