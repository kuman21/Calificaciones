<button {{ $attributes->merge(['type' => 'button', 'class' => 'text-indigo-600 hover:text-indigo-900']) }}>
    {{ $slot }}
</button>