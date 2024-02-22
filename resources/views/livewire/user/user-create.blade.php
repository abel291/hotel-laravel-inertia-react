@section('title', $label)
<x-slot name="header">
    <div class="flex justify-between items-end">
        <div>
            <x-breadcrumb :data="[
                [
                    'path' => route('dashboard.users.index'),
                    'name' => $labelPlural,
                ],
                [
                    'path' => null,
                    'name' => 'Creacion',
                ],
            ]" />
            <x-header-title class="mt-2">
                {{ $labelPlural }}
            </x-header-title>
        </div>


    </div>
</x-slot>
<div>
    <div class="flex flex-col lg:flex-row gap-5">
        <div class="w-full lg:w-8/12">
            <x-content class=" grow">
                <header>
                    <x-title>Información del perfil</x-title>
                    <p class="mt-1 text-sm text-neutral-600 dark:text-neutral-400">
                        Agregue la información del perfil y la dirección de correo electrónico de la cuenta y tambien
                        asegúrese de que el usuario utilice una contraseña larga y aleatoria para mantenerse segura.
                    </p>
                </header>
                <form class="mt-6" wire:submit.prevent="store">
                    <x-form.grid>
                        <div class="lg:col-span-6">
                            <x-form.input-label-error class="mt-1" wire:model="name">
                                Nombre
                            </x-form.input-label-error>
                        </div>
                        <div class="lg:col-span-6">
                            <x-form.input-label-error class="mt-1" wire:model="phone">
                                Telefono
                            </x-form.input-label-error>
                        </div>
                        <div class="lg:col-span-8">
                            <x-form.input-label-error class="mt-1" wire:model="email">
                                Email
                            </x-form.input-label-error>
                        </div>

                        <div class="lg:col-span-6">
                            <x-form.input-label-error class="mt-1" wire:model="country">
                                Pais
                            </x-form.input-label-error>
                        </div>
                        <div class="lg:col-span-6">
                            <x-form.input-label-error class="mt-1" wire:model="city">
                                Ciudad
                            </x-form.input-label-error>
                        </div>
                        @if (!$edit)
                            <div class="lg:col-span-6">
                                <x-form.input-label-error class="mt-1" type="password" wire:model="password">
                                    Contraseña
                                </x-form.input-label-error>
                            </div>
                            <div class="lg:col-span-6">
                                <x-form.input-label-error class="mt-1" type="password"
                                    wire:model="password_confirmation">
                                    Confirmar Contraseña
                                </x-form.input-label-error>
                            </div>
                        @endif

                    </x-form.grid>
                    <div class="text-right mt-6">
                        <a class="btn btn-secondary" href="{{ route('dashboard.users.index') }}">Cerrar</a>

                        <x-primary-button class="ml-2" wire:loading.attr="disabled">
                            {{ $edit ? 'Editar' : 'Crear Usuario' }}
                        </x-primary-button>

                    </div>
                </form>
            </x-content>
        </div>

        <div class="w-full lg:w-4/12">
            @if ($edit)
                <livewire:user.password-update-user :id="$id" />
            @endif
        </div>
    </div>
</div>
