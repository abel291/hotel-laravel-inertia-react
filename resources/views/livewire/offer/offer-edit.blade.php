<div>
    <div x-data="{
        show: @entangle('openModal'),
        edit: false,
    }" @modal-edit-offer.window="show = true; edit= true; $wire.edit($event.detail);"
        {{-- @modal-create{{ $id }}.window="show = true; edit= false; $wire.create();" --}}>


        <x-modal size="md" wire:target="create,edit,save,update">
            <x-slot name="title">
                {{ $label }}
            </x-slot>
            <x-slot name="content">
                <x-form.grid>
                    <div class="lg:col-span-4">
                        <x-form.input-label-error label="N° Noches" type="number" wire:model="nights" />
                    </div>
                    <div class="lg:col-span-4">
                        <x-form.input-group text="%" type="number" label="Porcentaje de descuento"
                            wire:model="percent" />
                    </div>
                </x-form.grid>
            </x-slot>
            <x-slot name="footer">
                <div class="text-right">
                    <x-secondary-button x-on:click="show=false" wire:loading.attr="disabled">
                        Cerrar
                    </x-secondary-button>
                    <x-primary-button x-show="edit" type="button" class="ml-2" wire:click="update"
                        wire:loading.attr="disabled">
                        Editar
                    </x-primary-button>

                </div>
            </x-slot>
        </x-modal>
    </div>
</div>
