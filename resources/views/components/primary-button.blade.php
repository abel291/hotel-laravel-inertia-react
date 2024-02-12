<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary relative disabled:opacity-50']) }}
    wire:loading.attr="disabled">
    <div wire:loading.class="invisible">
        {{ $slot }}
    </div>
    <span wire:loading class="text-center absolute flex justify-center items-center">
        <x-lucide-more-horizontal class="w-10" />
    </span>
</button>
