<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary relative disabled:opacity-50']) }}>
    {{ $slot }}
</button>
