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
                <x-form.grid>
                    <div class="lg:col-span-6">
                        <x-form.input-label-error label="Nombre" wire:model="name" />
                    </div>
                    <div class="lg:col-span-6">
                        <x-form.input-label-error label="Url" wire:model="slug" />
                    </div>

                    <div class="lg:col-span-6">
                        <x-form.select-active wire:model="active" />
                    </div>

                </x-form.grid>
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
