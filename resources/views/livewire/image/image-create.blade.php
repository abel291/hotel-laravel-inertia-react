{{-- @section('title', $labelPlural) --}}
{{-- <x-slot name="header">
    <div>
        <x-breadcrumb :data="[
            [
                'path' => route('dashboard.images.index', [$modelName, $modelId]),
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
</x-slot> --}}
{{--
<div class="max-w-6xl">


    <x-content>
        <x-desc-model :model-data="$modelData" />
        <form wire:submit.prevent="store" class="space-y-10">

            <section class="border-b border-neutral-900/10 pb-12">
                <x-form.grid class="mt-6">
                    <div class="lg:col-span-8">
                        <x-form.input-label-error wire:model="title">
                            Title
                        </x-form.input-label-error>
                    </div>
                    <div class="lg:col-span-4">
                        <x-form.input-label-error wire:model="order" type='number'>
                            Orden en que se mostraran
                        </x-form.input-label-error>
                    </div>
                    <div class="lg:col-span-8">
                        <x-form.input-label-error wire:model="alt">
                            alt
                        </x-form.input-label-error>
                    </div>


                    <div class="md:col-span-6">
                        <x-form.input-file model="img" :temp="$img" :saved="$imgSaved" label="Imagen" />
                    </div>
                </x-form.grid>

            </section>

            <div class="text-right mt-6">
                <a class="btn btn-secondary"
                    href="{{ route('dashboard.images.index', [$modelName, $modelId]) }}">Cerrar</a>

                <x-primary-button class="ml-2" wire:loading.attr="disabled">
                    {{ $isEdit ? 'Editar' : 'Crear Usuario' }}
                </x-primary-button>
            </div>
        </form>
        </header>
    </x-content>


</div> --}}

<div>
    <div x-data="{
        show: @entangle('openModal'),
        edit: false,
    }" @modal-edit.window="show = true; edit= true; $wire.edit($event.detail);"
        @modal-create.window="show = true; edit= false; $wire.create();">


        <x-modal size="md" wire:target="create,edit,save,update">
            <x-slot name="title">
                {{ $label }}
            </x-slot>
            <x-slot name="content">
                <section class="border-b border-neutral-900/10 pb-12">
                    <x-form.grid class="mt-6">
                        <div class="lg:col-span-8">
                            <x-form.input-label-error wire:model="title">
                                Title
                            </x-form.input-label-error>
                        </div>
                        <div class="lg:col-span-4">
                            <x-form.input-label-error wire:model="order" type='number' min="1">
                                Orden en que se mostraran
                            </x-form.input-label-error>
                        </div>
                        <div class="lg:col-span-8">
                            <x-form.input-label-error wire:model="alt">
                                alt
                            </x-form.input-label-error>
                        </div>


                        <div class="md:col-span-6">
                            <x-form.input-file model="img" :temp="$img" :saved="$imgSaved" label="Imagen" />
                        </div>
                    </x-form.grid>

                </section>
            </x-slot>
            <x-slot name="footer">
                <div class="text-right">
                    <x-secondary-button x-on:click="show=false" wire:loading.attr="disabled">
                        Cerrar
                    </x-secondary-button>
                    <x-primary-button type="button" class="ml-2" wire:click="store" wire:loading.attr="disabled">
                        Guardar
                    </x-primary-button>

                </div>
            </x-slot>
        </x-modal>
    </div>
</div>
