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
    </div>
</x-slot>
<div>
    <div class="flex justify-between items-end gap-2">
        <x-form.input-search />
        <a href="{{ route('dashboard.rooms.create') }}" class="btn btn-primary">
            Agregar {{ $label }}
        </a>
    </div>
    <x-content class="mt-4">

        <x-table.table :data="$list" wire:target="search">
            @php
                $headList = ['Nombre', 'Comodidades', 'Tipos de camas', 'Cantidad', 'Precio', 'Activo', 'opciones'];
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
                            <x-table.title-image :title="$item->name" :img="$item->thumb" :path="route('room', $item->slug)"
                                :sub-title="$item->slug" />

                        </td>

                        <td>
                            <div class='max-w-80'>
                                <x-room.list-amenities :amenities="$item->amenities" />
                            </div>
                        </td>
                        <td>
                            <x-room.list-beds :beds="$item->beds" />
                        </td>
                        <td>
                            {{ $item->quantity }}
                        </td>
                        <td>

                            <span class="font-medium whitespace-nowrap">
                                @money($item->price)
                            </span>
                        </td>
                        <td>
                            <x-badge-active :active="$item->active" />
                        </td>
                        <td>

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

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-table.table>
    </x-content>
    <x-modal-confirmation-delete />
</div>
