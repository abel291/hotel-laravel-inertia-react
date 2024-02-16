@section('title', $labelPlural)
<x-slot name="header">
    {{ $labelPlural }}
</x-slot>

<div>
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-2 my-4">
        <x-form.input-search />
        <div>
            <a href="{{ route('dashboard.create-user') }}" class="btn btn-primary">
                Agregar {{ $label }}
            </a>
        </div>
    </div>

    <x-content>
        <x-table.table :data="$list" wire:target="search">
            <thead>
                <tr>
                </tr>
            </thead>ID</th>
            </tr>
            </thead>Nombre</th>
            </tr>
            </thead>Email</th>
            </tr>
            </thead>Telefono</th>
            </tr>
            </thead>Pais - Ciudad</th>
            {{-- </tr>
                    </thead>Role</th> --}}
            </tr>
            </thead>
            </th>
            </tr>
            </thead>
            <tbody>
                @foreach ($list as $item)
                    <tr class="text-sm">
                        <td class="text-neutral-500 ">
                            {{ $item->id }}
                        </td>
                        <td class="whitespace-nowrap">
                            <x-table.title-image :title="$item->name" />
                        </td>
                        <td class="text-neutral-500 ">
                            {{ $item->email }}
                        </td>
                        <td class="text-neutral-500 ">
                            <x-badge>{{ $item->phone }}</x-badge>
                        </td>

                        <td>
                            <span class="text-xs font-medium block text-neutral-700">
                                {{ $item->country }}
                            </span>

                            <span class="text-xs block text-neutral-600">
                                {{ $item->city }}
                            </span>

                        </td>

                        {{-- <td class="text-neutral-500 ">
                            @php
                                switch ($item->getRoleNames()->first()) {
                                    case 'admin':
                                        $color = 'bg-green-100 text-green-600 ring-green-600/20';
                                        break;

                                    default:
                                        $color = 'bg-neutral-100 text-neutral-600 ring-neutral-500/10';
                                        break;
                                }
                            @endphp

                            <x-badge class="{{ $color }} capitalize">
                                {{ $item->getRoleNames()->first() }}
                            </x-badge>
                        </td> --}}

                        <td class="">
                            <div class="flex items-stretch justify-end gap-x-3">
                                {{-- <button x-data class="text-indigo-600 font-medium"
                                    x-on:click="$dispatch('modal-show-user',{{ $item->id }})">
                                    Ver
                                </button> --}}
                                <a href="{{ route('dashboard.edit-user', $item->id) }}"
                                    class="text-indigo-600 font-medium">
                                    Editar
                                </a>

                                <button x-data class="text-red-600 font-medium "
                                    x-on:click="$dispatch('open-modal-confirmation-delete',{{ $item->id }})">Eliminar</button>
                            </div>

                        </td>

                    </tr>
                @endforeach
            </tbody>
        </x-table.table>
    </x-content>
    <x-modal-confirmation-delete />
</div>
