<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-sm btn-success rounded-0']) }}>
    {{ $slot }}
</button>
