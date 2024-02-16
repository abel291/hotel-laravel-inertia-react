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

    </div>
</x-slot>

<div>
    <div class="flex justify-between items-end gap-2">
        <x-form.input-search />
        <x-primary-button x-data x-on:click="$dispatch('modal-create')">
            Agregar {{ $label }}
        </x-primary-button>
    </div>
    <x-content class="mt-4">
        <div class="flex justify-between items-end gap-2">
            <x-desc-model :img="$modelData->img" :title="$modelData->name" />
        </div>
        <x-table.table class="mt-6" :data="$list" wire:target="search">
            @php
                $headList = ['Imagen', 'title', 'alt', 'order', 'fechas', ''];
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
                            <x-table.title-image :img="$item->img" />
                        </td>

                        <td>
                            {{ $item->title }}
                        </td>
                        <td>
                            {{ $item->alt }}
                        </td>
                        <td>
                            {{ $item->order }}
                        </td>

                        <td>
                            <x-date-format :date="$item->updated_at" />
                        </td>

                        <td>
                            <div class="inline-flex items-center gap-x-2">
                                {{-- <a href="{{ route('dashboard.images.edit', [$modelName, $modelId, $item->id]) }}"
                                    class="table-button-option">Editar</a> --}}
                                <button type="button" x-data :key="'edit_' + {{ $item->id }}"
                                    class="table-button-option"
                                    x-on:click="$dispatch('modal-edit',{{ $item->id }})">
                                    Editar
                                </button>
                                <button class="table-button-option-danger" x-data
                                    x-on:click="$dispatch('open-modal-confirmation-delete',{{ $item->id }})">
                                    Eliminar
                                </button>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-table.table>
    </x-content>
    <x-modal-confirmation-delete />
    <livewire:image.image-create :model-data="$modelData" :label="$label" :label-plural="$labelPlural" />

</div>
