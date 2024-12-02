<button {{ $attributes->merge(['type' => 'button', 'class' => 'w-full border-white border-2 text-black py-2 rounded-full hover:bg-white text-center block']) }}>
    {{ $slot }}
</button>
