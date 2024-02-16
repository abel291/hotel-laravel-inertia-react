@section('title', $labelPlural)
<x-slot name="header">
    <div class="flex justify-between items-end">
        <div>
            <x-breadcrumb :data="[
                [
                    'path' => route('dashboard.amenities.index'),
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
        <a href="{{ route('dashboard.posts.create') }}" class="btn btn-primary">
            Agregar {{ $label }}
        </a>


    </div>
</x-slot>

<div>

    <div class=" bg-white overflow-hidden rounded-lg border">
        <div class="flex justify-end gap-2 py-4 px-6">
            <x-form.input-search />
        </div>
        <x-table.table :data="$list" wire:target="search">
            @php
                $headList = ['Titulo', 'Pequeña descripcion', 'activo', 'Fechas', ''];
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
                            <x-table.title-image :title="$item->title" :path="route('post', $item->slug)" :img="$item->thumb"
                                :sub-title="$item->slug" />
                        </x-table.td>

                        <x-table.td>
                            <p class="max-w-sm">
                                {{ $item->entry }}
                            </p>
                        </x-table.td>
                        <x-table.td>
                            <x-badge-active :active="$item->active" />
                        </x-table.td>
                        <x-table.td>
                            <x-date-format :date="$item->updated_at" />
                        </x-table.td>

                        <x-table.td>
                            <div class="flex items-center gap-x-2">
                                <a href="{{ route('dashboard.posts.edit', $item->id) }}"
                                    class="table-button-option">Editar</a>
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


</div>
