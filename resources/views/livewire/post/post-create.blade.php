@section('title', $labelPlural)
<x-slot name="header">
    <div>
        <x-breadcrumb :data="[
            [
                'path' => route('dashboard.posts.index'),
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
                <header>
                    <x-title>Datos del post</x-title>
                </header>

                <x-form.grid class="mt-6">
                    <div class="lg:col-span-8">
                        <x-form.input-label-error wire:model="title">
                            Titulo
                        </x-form.input-label-error>
                    </div>
                    <div class="lg:col-span-8">
                        <x-form.input-label-error wire:model="slug">
                            Url
                        </x-form.input-label-error>
                    </div>
                    <div class="lg:col-span-12">
                        <x-form.input-label-error wire:model="entry">
                            Pequeña descripcion
                        </x-form.input-label-error>
                    </div>

                    <div class="lg:col-span-6">
                        <x-form.input-label-error wire:model="seo_title">
                            seo title
                        </x-form.input-label-error>
                    </div>
                    <div class="lg:col-span-6">
                        <x-form.input-label-error wire:model="seo_desc">
                            seo description
                        </x-form.input-label-error>
                    </div>
                    <div class="md:col-span-3">
                        <x-form.select-active wire:model="active" />
                    </div>
                    <div class="md:col-span-3">
                        <x-form.select label="Aparecer en el Home" wire:model="home">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </x-form.select>
                    </div>
                    <div class="md:col-span-12">
                        <x-form.textarea rows="5" label="Descripcion amplia " wire:model="description" />
                    </div>
                    <div class="md:col-span-6">
                        <x-form.input-file model="img" :temp="$img" :saved="$imgSaved" label="Imagen amplia" />
                    </div>
                    <div class="md:col-span-6">
                        <x-form.input-file model="thumb" :temp="$thumb" :saved="$thumbSaved"
                            label="Imagen miniatura" />
                    </div>

                </x-form.grid>

            </section>
            <div class="text-right mt-6">
                <a class="btn btn-secondary" href="{{ route('dashboard.posts.index') }}">Cerrar</a>

                <x-primary-button class="ml-2" wire:loading.attr="disabled">
                    {{ $isEdit ? 'Editar' : 'Crear Usuario' }}
                </x-primary-button>
            </div>
        </form>

    </x-content>

</div>
