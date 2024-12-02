@props(['label', 'value' => '', 'name', 'type' => 'text', 'placeholder' => 'Data belum terisi'])

<div class="bg-white bg-gradient-to-r from-yellow-100 to-purple-400 rounded-2xl shadow-md p-6">
    <!-- Label -->
    <label for="{{ $name }}" class="block text-md font-medium text-gray-700">
        {{ $label }}
    </label>

    <!-- Input Field -->
    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        value="{{ old($name, $value) }}"
        {{ $attributes->merge(['class' => 'w-full mt-2 px-4 py-2 text-2xl font-bold border rounded-2xl focus:outline-none focus:ring-2 focus:ring-purple-500']) }}
        placeholder="{{ $placeholder }}"
    />
</div>
