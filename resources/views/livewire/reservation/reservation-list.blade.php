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

    <div class="flex justify-between items-end gap-2">
        <x-form.input-search />
    </div>
    <x-content class="mt-4">
        <x-table.table :data="$list" wire:target="search">
            @php
                $headList = ['Codigo', 'Nombre', 'Fechas', 'Habitacion', 'Estado', 'Pago', 'opciones'];
            @endphp
            <thead>
                <tr>
                    @foreach ($headList as $name)
                        <th>{{ $name }}</th>
                    @endforeach

                </tr>
            </thead>
            <tbody>
                @foreach ($list as $item)
                    <tr>
                        <td>
                            <x-table.title-image :title="$item->code" />
                        </td>
                        <td>
                            <x-table.title-image :title="$item->data->user->name" :sub-title="$item->data->user->email" />
                        </td>
                        <td>
                            <div class="flex  gap-x-1">
                                <span>{{ $item->start_date->isoFormat('DD MMM ') }} </span>
                                <span>-</span>
                                <span>{{ $item->end_date->isoFormat('DD MMM') }} </span>
                            </div>
                            <x-badge class="mt-2">{{ $item->nights }}
                                noche{{ $item->nights > 1 ? 's' : '' }}</x-badge>
                        </td>
                        <td>
                            <div class="flex flex-col gap-y-0.5">
                                <span class="font-medium">{{ $item->data->room->name }} </span>
                            </div>
                        </td>

                        <td>
                            <span class="font-semibold text-{{ $item->state->color() }}-600 whitespace-nowrap">
                                @money($item->total)
                            </span>
                        </td>
                        <td>
                            <x-badge :color="$item->state->color()">{{ $item->state->text() }}</x-badge>
                        </td>

                        <td>

                            <a href="{{ route('dashboard.reservations.show', $item->id) }}"
                                class="table-button-option flex items-center gap-x-2 whitespace-nowrap">
                                <x-lucide-eye class="w-4 h-4" />
                                Ver detales
                            </a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-table.table>
    </x-content>
</div>
