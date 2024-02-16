@section('title', $labelPlural)
<x-slot name="header">
    <div class="flex justify-between items-end">
        <div>
            <x-breadcrumb :data="[
                [
                    'path' => route('dashboard.images.index', [$modelName, $modelId]),
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
        <x-primary-button x-data x-on:click="$dispatch('modal-create')">
            Agregar {{ $label }}
        </x-primary-button>
    </div>
</x-slot>

<div>
    <div class=" bg-white overflow-hidden rounded-lg border">

        <div class="flex justify-between items-end gap-2 py-4 px-6">
            <x-desc-model :img="$modelData->img" :title="$modelData->name" />
            <x-form.input-search />
        </div>
        <x-table.table :data="$list" wire:target="search">
            @php
                $headList = ['Imagen', 'title', 'alt', 'order', 'fechas', ''];
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
                            <x-table.title-image :img="$item->img" />
                        </x-table.td>

                        <x-table.td>
                            {{ $item->title }}
                        </x-table.td>
                        <x-table.td>
                            {{ $item->alt }}
                        </x-table.td>
                        <x-table.td>
                            {{ $item->order }}
                        </x-table.td>

                        <x-table.td>
                            <x-date-format :date="$item->updated_at" />
                        </x-table.td>

                        <x-table.td>
                            <div class="inline-flex items-center gap-x-2">
                                {{-- <a href="{{ route('dashboard.images.edit', [$modelName, $modelId, $item->id]) }}"
                                    class="table-button-option">Editar</a> --}}
                                <button type="button" x-data :key="'edit_' + {{ $item->id }}"
                                    class="table-button-option" x-on:click="$dispatch('modal-edit',{{ $item->id }})">
                                    Editar
                                </button>
                                <button class="table-button-option-danger" x-data
                                    x-on:click="$dispatch('open-modal-confirmation-delete',{{ $item->id }})">
                                    Eliminar
                                </button>
                            </div>

                        </x-table.td>
                    </x-table.tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
    </div>
    <x-modal-confirmation-delete />
    <livewire:image.image-create :model-data="$modelData" :label="$label" :label-plural="$labelPlural" />

</div>
