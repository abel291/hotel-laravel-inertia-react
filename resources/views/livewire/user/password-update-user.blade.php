<x-content class=" grow">
    <form wire:submit.prevent="updatePassword">
        <header>
            <x-title>Actualiza contraseña</x-title>
        </header>
        <x-form.grid class="mt-6">
            <div class="lg:col-span-12">
                <x-form.input-label-error class="mt-1" type="password" wire:model="password">
                    Contraseña
                </x-form.input-label-error>
            </div>
            <div class="lg:col-span-12">
                <x-form.input-label-error class="mt-1" type="password" wire:model="password_confirmation">
                    Confirmar Contraseña
                </x-form.input-label-error>
            </div>
        </x-form.grid>
        <div class="text-right mt-6">
            <x-primary-button class="ml-2" wire:loading.attr="disabled">
                Guardar
            </x-primary-button>
        </div>
    </form>
</x-content>
