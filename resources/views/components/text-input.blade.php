@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full px-4 py-2 border rounded-full focus:outline-none focus:ring-2 focus:ring-purple-500']) }}>
