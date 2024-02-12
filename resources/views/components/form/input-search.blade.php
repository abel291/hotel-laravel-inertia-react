<div class="flex flex-col md:flex-row md:items-center gap-2 md:gap-3">
    <div>
        <x-form.input-group type="text" wire:model.live.debounce.500ms="search" placeholder="Buscar" class="md:w-64">
            <x-slot:text>
                <x-lucide-search class="w-5 text-gray-400" />
            </x-slot:text>
        </x-form.input-group>
        {{-- <x-text-input type="text" wire:model.live.debounce.500ms="search" placeholder="Buscar" class="md:w-64" /> --}}
    </div>
    {{ $slot }}
    <x-spinner-loading wire:loading wire:target="search" class="mt-1" />

</div>
