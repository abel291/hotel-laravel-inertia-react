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

        <a href="{{ route('dashboard.rooms.create') }}" class="btn btn-primary">
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
                $headList = ['Nombre', 'Comodidades', 'Tipos de camas', 'Cantidad', 'Precio', 'Activo', 'opciones'];
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
                            <x-table.title-image :title="$item->name" :img="$item->thumb" :path="route('room', $item->slug)"
                                :sub-title="$item->slug" />

                        </x-table.td>

                        <x-table.td>
                            <div class='max-w-80'>
                                <x-room.list-amenities :amenities="$item->amenities" />
                            </div>
                        </x-table.td>
                        <x-table.td>
                            <x-room.list-beds :beds="$item->beds" />
                        </x-table.td>
                        <x-table.td>
                            {{ $item->quantity }}
                        </x-table.td>
                        <x-table.td>

                            <span class="font-medium whitespace-nowrap">
                                @money($item->price)
                            </span>
                        </x-table.td>
                        <x-table.td>
                            <x-badge-active :active="$item->active" />
                        </x-table.td>
                        <x-table.td>

                            <div class="flex items-center gap-x-2">
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button class="table-button-option flex items-center">
                                            <span>Editar</span>
                                            <x-heroicon-m-chevron-down class="h-4 w-4 ml-0.5" />
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link href="{{ route('dashboard.rooms.edit', $item->id) }}">
                                            Datos Basicos
                                        </x-dropdown-link>
                                        <x-dropdown-link
                                            href="{{ route('dashboard.images.index', ['room', $item->id]) }}">
                                            Imagenes
                                        </x-dropdown-link>
                                    </x-slot>
                                </x-dropdown>

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
