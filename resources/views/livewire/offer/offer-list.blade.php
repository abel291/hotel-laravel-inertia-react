@section('title', $labelPlural)
<x-slot name="header">
    <div class="flex justify-between items-end">
        <div>
            <x-breadcrumb :data="[
                [
                    'path' => route('dashboard.offers.index'),
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


    </div>
</x-slot>

<div>


    <x-content class="mt-4">
        <x-table.table :data="$list" wire:target="search">
            @php
                $headList = ['N° Noches', 'Porcentaje de descuento', 'Fecha de Modificaion', ''];
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
                            <x-table.title-image :title="$item->nights . ' noches'" />

                        </td>

                        <td>
                            <x-badge>
                                {{ $item->percent }}%
                            </x-badge>
                        </td>

                        <td>
                            <x-date-format :date="$item->updated_at" />
                        </td>

                        <td>
                            <button type="button" x-data :key="'edit_' + {{ $item->id }}" class="table-button-option"
                                x-on:click="$dispatch('modal-edit-offer',{{ $item->id }})">
                                Editar
                            </button>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-table.table>
    </x-content>
    <livewire:offer.offer-edit :label="$label" :label-plural="$labelPlural" />

</div>
