@section('title', $labelPlural)
<x-slot name="header">
    <div>
        <x-breadcrumb :data="[
            [
                'path' => route('dashboard.rooms.index'),
                'name' => $labelPlural,
            ],
            [
                'path' => null,
                'name' => $isEdit ? 'Edicion' : 'Creacion',
            ],
        ]" />
        <x-header-title class="mt-2">
            {{ $label }}
        </x-header-title>
    </div>
</x-slot>

<div class="max-w-6xl">


    <x-content>
        <form wire:submit.prevent="{{ $isEdit ? 'update' : 'save' }}" class="space-y-10">

            <section class="border-b border-neutral-900/10 pb-12">
                <header>
                    <x-title>Datos de la habitacion</x-title>
                </header>

                <x-form.grid class="mt-6">
                    <div class="lg:col-span-8">
                        <x-form.input-label-error wire:model="form.name">
                            Nombre
                        </x-form.input-label-error>
                    </div>
                    <div class="lg:col-span-8">
                        <x-form.input-label-error wire:model="form.slug">
                            Url
                        </x-form.input-label-error>
                    </div>
                    <div class="lg:col-span-12">
                        <x-form.input-label-error wire:model="form.entry">
                            Pequeña descripcion
                        </x-form.input-label-error>
                    </div>
                    <div class="lg:col-span-3">
                        <x-form.input-label-error type="number" min="1" wire:model="form.quantity">
                            Cantidadde habitaciones
                        </x-form.input-label-error>
                    </div>
                    <div class="lg:col-span-3">
                        <x-form.input-label-error type="number" min="1" wire:model="form.price">
                            Precio
                        </x-form.input-label-error>
                    </div>
                    <div class="lg:col-span-3">
                        <x-form.input-label-error type="number" min="1" wire:model="form.adults">
                            Adultos
                        </x-form.input-label-error>
                    </div>
                    <div class="lg:col-span-3">
                        <x-form.input-label-error type="number" min="0" wire:model="form.kids">
                            Niños
                        </x-form.input-label-error>
                    </div>
                    <div class="md:col-span-3">
                        <x-form.select-active wire:model="form.active" />
                    </div>
                    <div class="md:col-span-3">
                        <x-form.select label="Aparecer en el Home" wire:model="form.home">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </x-form.select>
                    </div>
                    <div class="md:col-span-3">
                        <x-form.select label="Aparecer en 'Acerca de' " wire:model="form.about">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </x-form.select>
                    </div>
                    <div class="md:col-span-12">
                        <x-form.textarea rows="5" label="Descripcion amplia " wire:model="form.description" />
                    </div>
                    <div class="md:col-span-6">
                        <x-form.input-file model="form.img" :temp="$form->img" :saved="$imgSaved" label="Imagen amplia" />
                    </div>
                    <div class="md:col-span-6">
                        <x-form.input-file model="form.thumb" :temp="$form->thumb" :saved="$thumbSaved"
                            label="Imagen miniatura" />
                    </div>

                </x-form.grid>

            </section>

            <section class="border-b border-neutral-900/10 pb-12">
                <header>
                    <x-title>
                        Seleccion de comodidades
                        <x-input-error :messages="$errors->get('form.amenities')" />
                    </x-title>
                </header>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-x-6 gap-y-6 mt-6">
                    @foreach ($amenitiyList as $key => $amenity)
                        <x-form.input-checkbox wire:model="form.amenities" value="{{ $amenity->id }}">
                            <div class="flex items-center text-sm">
                                <img src="{{ $amenity->icon }}" class="w-6 mr-1.5" />
                                <span>
                                    {{ $amenity->name }}
                                </span>
                            </div>
                        </x-form.input-checkbox>
                    @endforeach
                </div>

            </section>
            <section class="border-b border-neutral-900/10 pb-12">
                <header>
                    <x-title>
                        Seleccion de camas
                        <x-input-error :messages="$errors->get('form.beds')" />
                    </x-title>
                </header>
                <x-form.grid class="mt-6">
                    @foreach ($bedList as $key => $bed)
                        <div class="lg:col-span-3">
                            <x-input-label for="form.beds.{{ $bed->id }}">
                                <div class="flex items-center">
                                    <img src={{ $bed->icon }} class="w-6 mr-2" />
                                    <span class="block">{{ $bed->name }}</span>
                                </div>
                            </x-input-label>
                            <x-form.select wire:model="form.beds.{{ $bed->id }}">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </x-form.select>
                        </div>
                    @endforeach
                </x-form.grid>

            </section>
            <div class="text-right mt-6">
                <a class="btn btn-secondary" href="{{ route('dashboard.rooms.index') }}">Cerrar</a>

                <x-primary-button class="ml-2" wire:loading.attr="disabled">
                    {{ $isEdit ? 'Editar' : 'Crear Usuario' }}
                </x-primary-button>
            </div>
        </form>
        </header>
    </x-content>

</div>
