<div class="bg-white bg-gradient-to-r from-yellow-100 to-purple-400 rounded-2xl shadow-md p-6">
    <label class="block text-md font-medium text-gray-700">{{ $slot }}</label>
    <p class="text-2xl font-bold {{ $title ? 'text-black' : 'text-gray-400 italic' }}">
        {{ $title ?: 'Data belum terisi' }}
    </p>
</div>

