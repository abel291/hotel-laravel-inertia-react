@section('title', $labelPlural)
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $labelPlural }}
    </h2>
</x-slot>

<div>

    <x-content>
        <x-table.table :data="$list" wire:target="search">
            @php
                $headList = ['N° Noches', 'Porcentaje de descuento', 'Fecha de Modificaion', ''];
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
                            <x-table.title-image :title="$item->nights . ' noches'" />

                        </x-table.td>

                        <x-table.td>
                            <x-badge>
                                {{ $item->percent }}%
                            </x-badge>
                        </x-table.td>

                        <td>
                            <x-date-format :date="$item->updated_at" />
                        </td>

                        <x-table.td>
                            <button type="button" x-data :key="'edit_' + {{ $item->id }}"
                                class="text-indigo-600 hover:text-indigo-700 font-medium"
                                x-on:click="$dispatch('modal-edit-offer',{{ $item->id }})">
                                Editar
                            </button>

                        </x-table.td>
                    </x-table.tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
    </x-content>
    <livewire:offer.offer-edit :label="$label" :label-plural="$labelPlural" />

</div>
