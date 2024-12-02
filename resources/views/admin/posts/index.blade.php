<x-app-layout title="Admin - Semua Artikel">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Semua Artikel</h1>
        <a href="{{ route('admin.posts.create') }}" 
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md shadow">
            Buat Artikel Baru
        </a>
    </div>

    {{-- Table Wrapper --}}
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Judul
                    </th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Penulis
                    </th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Dibuat
                    </th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($posts as $post)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                            {{ $post->title }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500">
                            {{ $post->author->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500">
                            {{ $post->created_at->diffForHumans() }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <a href="{{ route('admin.posts.edit', $post) }}" 
                               class="text-blue-500 hover:text-blue-600 font-medium">
                                Edit
                            </a>
                            <span class="text-gray-400">|</span>
                            <form action="{{ route('admin.posts.destroy', $post) }}" 
                                  method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-500 hover:text-red-600 font-medium">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
