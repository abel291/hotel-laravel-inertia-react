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



    </div>
</x-slot>

<div>

    <div class="flex justify-between items-end gap-2">
        <x-form.input-search />
        <a href="{{ route('dashboard.amenities.create') }}" class="btn btn-primary">
            Agregar {{ $label }}
        </a>
    </div>
    <x-content class="mt-4">

        <x-table.table :data="$list" wire:target="search">
            @php
                $headList = ['Icono', 'Nombre', 'Pequeña descripcion', 'Habitaciones', 'Fechas', ''];
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
                            <img src="{{ $item->icon }}" alt="" class="w-8 h-8">
                        </td>
                        <td>
                            <x-table.title-image :title="$item->name" />
                        </td>

                        <td>
                            <p class="max-w-sm">
                                {{ $item->entry }}
                            </p>
                        </td>
                        <td>
                            {{ $item->rooms_count }}
                        </td>


                        <td>
                            <x-date-format :date="$item->updated_at" />
                        </td>

                        <td>
                            <div class="flex items-center gap-x-2">
                                <a href="{{ route('dashboard.amenities.edit', $item->id) }}"
                                    class="table-button-option">Editar</a>
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
