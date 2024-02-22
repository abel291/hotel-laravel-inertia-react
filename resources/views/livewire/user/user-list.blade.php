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
        <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary">
            Agregar {{ $label }}
        </a>

    </div>
    <x-content class="mt-4">
        <x-table.table :data="$list" wire:target="search">
            @php
                $headList = ['Nombre', 'Telefono', 'Pais - Ciudad', 'Fecha de Modificaion', ''];
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
                            <x-table.title-image :title="$item->name" :sub-title="$item->email" />

                        </td>

                        <td>
                            {{ $item->phone }}
                        </td>
                        <td>
                            {{ $item->country }} - {{ $item->city }}
                        </td>

                        <td>
                            <x-date-format :date="$item->updated_at" />
                        </td>

                        <td>
                            <div class="flex items-center gap-x-2">
                                <a href="{{ route('dashboard.users.edit', $item->id) }}" class="table-button-option">
                                    Editar
                                </a>
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
