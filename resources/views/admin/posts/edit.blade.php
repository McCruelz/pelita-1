<x-app-layout title="{{ isset($post) ? 'Edit Artikel' : 'Buat Artikel Baru' }}">
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            {{ isset($post) ? 'Edit Artikel' : 'Buat Artikel Baru' }}
        </h1>

        <form action="{{ isset($post) ? route('admin.posts.update', $post) : route('admin.posts.store') }}" 
              method="POST" 
              enctype="multipart/form-data" 
              class="space-y-6">
            @csrf
            @if (isset($post))
                @method('PATCH')
            @endif

            {{-- Judul --}}
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                <input type="text" name="title" id="title" 
                       class="block w-full rounded-2xl border-gray-300 shadow-sm sm:text-sm p-2"
                       value="{{ old('title', $post->title ?? '') }}">
                @error('title')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Slug --}}
            <div>
                <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Slug</label>
                <input type="text" name="slug" id="slug" 
                       class="block w-full rounded-2xl border-gray-300 shadow-sm sm:text-sm p-2"
                       value="{{ old('slug', $post->slug ?? '') }}">
                @error('slug')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Konten --}}
            <div>
                <label for="body" class="block text-sm font-medium text-gray-700 mb-1">Konten</label>
                <textarea name="body" id="body" 
                          class="block w-full rounded-2xl border-gray-300 shadow-sm sm:text-sm p-2"
                          rows="8">{{ old('body', $post->body ?? '') }}</textarea>
                @error('body')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Gambar --}}
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Gambar</label>
                <div id="drop-area" class="border-2 border-dashed border-gray-300 p-6 rounded-lg flex flex-col items-center justify-center cursor-pointer">
                    <p class="text-sm text-gray-600">Seret dan jatuhkan gambar di sini, atau klik untuk memilih file</p>
                    <input type="file" name="image" id="image" class="hidden" onchange="previewImage(event)">
                </div>
                
                {{-- Preview gambar yang sudah ada --}}
                @if (isset($post) && $post->image)
                    <div class="mt-4">
                        <img id="current-image" src="{{ asset('storage/' . $post->image) }}" alt="Gambar" 
                             class="w-full max-w-sm h-48 rounded-lg shadow-md object-cover">
                    </div>
                @endif

                {{-- Preview gambar baru --}}
                <div id="image-preview" class="mt-4 hidden">
                    <p class="text-sm text-gray-500 mb-2">Preview:</p>
                    <img id="preview-image" src="#" alt="Preview Gambar" 
                         class="w-full max-w-sm h-48 rounded-lg shadow-md object-cover">
                </div>

                @error('image')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol Submit --}}
            <div>
                <button type="submit" 
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow focus:outline-none focus:ring focus:ring-blue-300 transition">
                    {{ isset($post) ? 'Perbarui' : 'Buat' }}
                </button>
            </div>
        </form>
    </div>

    {{-- Script untuk Preview Gambar --}}
    <script>
        function previewImage(event) {
            const input = event.target;
            const previewContainer = document.getElementById('image-preview');
            const previewImage = document.getElementById('preview-image');
            const currentImage = document.getElementById('current-image');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewContainer.classList.remove('hidden');
                    previewImage.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);

                // Sembunyikan gambar saat ini jika ada
                if (currentImage) {
                    currentImage.style.display = 'none';
                }

            }
        }

                // Drag-and-Drop
                const dropArea = document.getElementById('drop-area');
        const inputFile = document.getElementById('image');

        // Mencegah perilaku default saat file di-drag ke dalam area
        dropArea.addEventListener('dragover', function(event) {
            event.preventDefault();
            dropArea.classList.add('bg-gray-100');
        });

        dropArea.addEventListener('dragleave', function() {
            dropArea.classList.remove('bg-gray-100');
        });

        dropArea.addEventListener('drop', function(event) {
            event.preventDefault();
            dropArea.classList.remove('bg-gray-100');
            const files = event.dataTransfer.files;
            if (files.length > 0) {
                inputFile.files = files;
                previewImage({ target: inputFile }); // Tampilkan preview gambar setelah di-drop
            }
        });

        // Membuka file dialog jika area diklik
        dropArea.addEventListener('click', function() {
            inputFile.click();
        });
    </script>
</x-app-layout>
