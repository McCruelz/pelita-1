<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full bg-purple-600 text-white py-2 rounded-full hover:bg-purple-700']) }}>
    {{ $slot }}
</button>
