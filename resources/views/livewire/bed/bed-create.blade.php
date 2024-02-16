@section('title', $labelPlural)
<x-slot name="header">
    <div>
        <x-breadcrumb :data="[
            [
                'path' => route($nameRouteDataList),
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
        <form wire:submit.prevent="store" class="space-y-10">

            <section class="border-b border-neutral-900/10 pb-12">
                <x-form.grid class="mt-6">
                    <div class="lg:col-span-8">
                        <x-form.input-label-error wire:model="name">
                            Nombre
                        </x-form.input-label-error>
                    </div>

                    <div class="lg:col-span-8">
                        <x-form.textarea label='Pequeña descripcion' rows="4" wire:model="entry" />
                    </div>

                    <div class="md:col-span-6">
                        <x-form.input-file model="img" :temp="$img" :saved="$imgSaved" label="Icono" />
                    </div>
                </x-form.grid>

            </section>

            <div class="text-right mt-6">
                <a class="btn btn-secondary" href="{{ route($nameRouteDataList) }}">Cerrar</a>

                <x-primary-button class="ml-2" wire:loading.attr="disabled">
                    {{ $isEdit ? 'Editar' : 'Crear Usuario' }}
                </x-primary-button>
            </div>
        </form>
        </header>
    </x-content>


</div>
