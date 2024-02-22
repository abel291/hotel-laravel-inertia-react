@section('title', $labelPlural)
<x-slot name="header">
    <div class="flex justify-between items-end">
        <div>
            <x-breadcrumb :data="[
                [
                    'path' => route('dashboard.categories.index'),
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
        <x-primary-button type="button" x-data x-on:click="$dispatch('modal-create')">
            Agregar {{ $label }}
        </x-primary-button>

    </div>
    <x-content class="mt-4">
        <x-table.table :data="$list" wire:target="search">
            @php
                $headList = ['Nombre', 'url', 'activo', 'Fecha de Modificaion', ''];
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
                            <x-table.title-image :title="$item->name" />

                        </td>

                        <td>
                            /{{ $item->slug }}
                        </td>
                        <td>
                            <x-badge-active :active="$item->active" />
                        </td>

                        <td>
                            <x-date-format :date="$item->updated_at" />
                        </td>

                        <td>
                            <div class="flex items-center gap-x-2">
                                <button type="button" x-data :key="'edit_' + {{ $item->id }}"
                                    class="text-indigo-600 hover:text-indigo-700 font-medium"
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
    <livewire:category.category-create :label="$label" :label-plural="$labelPlural" />
    <x-modal-confirmation-delete />
</div>
