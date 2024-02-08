<div>
    <div x-data="{
        show: @entangle('open_modal_confirmation_delete'),
        id_delete: null
    }" @open-modal-confirmation-delete.window="show = true;id_delete=$event.detail;">

        <x-modal wire:target="delete" size="sm">
            <x-slot name="title">
                Borrar Registro
            </x-slot>
            <x-slot name="content">
                <p class=" text-gray-600 dark:text-gray-400">
                    Una vez que se elimine este registro, todos los recursos y datos se eliminarán permanentemente
                </p>
                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="show=false" wire:loading.attr="disabled">
                        Cancelar
                    </x-secondary-button>

                    <x-danger-button class="ml-2" x-on:click="$wire.delete(id_delete)" wire:loading.attr="disabled">
                        <span wire:loading.class="hidden" wire:target="delete">Borrar regsitro</span>
                        <span wire:loading wire:target="delete"> Borrando... </span>
                    </x-danger-button>
                </div>
            </x-slot>

        </x-modal>
    </div>
</div>
