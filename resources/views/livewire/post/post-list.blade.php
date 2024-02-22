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
        <a href="{{ route('dashboard.posts.create') }}" class="btn btn-primary">
            Agregar {{ $label }}
        </a>
    </div>
    <x-content class="mt-4">

        <x-table.table :data="$list" wire:target="search">
            @php
                $headList = ['Titulo', 'tags', 'activo', 'Fechas', ''];
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
                            <x-table.title-image :title="$item->title" :path="route('post', $item->slug)" :img="$item->thumb"
                                :sub-title="$item->category->name" />
                        </td>

                        <td>
                            <div class="flex gap-1.5 flex-wrap">
                                @foreach ($item->tags as $tag)
                                    <x-badge color="indigo">{{ $tag->name }}</x-badge>
                                @endforeach
                            </div>
                        </td>
                        <td>
                            <x-badge-active :active="$item->active" />
                        </td>
                        <td>
                            <x-date-format :date="$item->updated_at" />
                        </td>

                        <td>
                            <div class="flex items-center gap-x-2">
                                <a href="{{ route('dashboard.posts.edit', $item->id) }}"
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
