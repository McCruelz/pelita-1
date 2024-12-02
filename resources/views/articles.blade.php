<x-layout>
    <x-slot:title> {{$title}} </x-slot:title>

    <div class="max-w-screen-lg mx-auto">
        {{-- Artikel Utama --}}
        <div class="flex flex-col md:flex-row gap-6 py-8 border-b border-gray-200">
            {{-- Gambar Artikel Utama --}}
            @if($articles->first()->image)
                <div class="w-full md:w-1/2">
                    <a href="/article/{{$articles->first()->slug}}">
                        <img 
                            src="{{ asset('storage/' . $articles->first()->image) }}"
                            alt="{{ $articles->first()->title }}"
                            class="rounded-2xl shadow-md w-full h-64 object-cover">
                    </a>
                </div>
            @endif

            {{-- Konten Artikel Utama --}}
            <div class="w-full md:w-1/2">
                <a href="/article/{{$articles->first()->slug}}" class="hover:underline">
                    <h1 class="mb-2 text-3xl font-bold text-gray-800 capitalize">{{ $articles->first()->title }}</h1>
                </a>
                <div class="mb-4 text-sm text-gray-500">
                    <span> Oleh {{ $articles->first()->author->name }}</span> 
                    | {{ $articles->first()->created_at->diffForHumans() }}
                </div>
                <p class="text-gray-700 font-light mb-4">
                    {{ Str::limit($articles->first()->body, 300) }}
                </p>
                <a href="/article/{{$articles->first()->slug}}" class="text-blue-500 font-medium hover:underline">
                    Read More &raquo;
                </a>
            </div>
        </div>

        {{-- Artikel Terbaru --}}
        <div class="mt-8">
            <h2 class="text-2xl font-bold mb-4 text-gray-800">Artikel Terbaru</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                @foreach ($articles->skip(1)->take(8) as $post)
                    <div 
                        class="relative h-60 rounded-2xl shadow-md bg-cover bg-center flex flex-col justify-end p-4 text-white"
                        style="background-image: url('{{ $post->image ? asset('storage/' . $post->image) : asset('default-image.jpg') }}')">
                        
                        {{-- Overlay untuk gradient gelap --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent bg-opacity-50 rounded-2xl"></div>
                        
                        {{-- Konten Artikel --}}
                        <div class="relative z-10">
                            {{-- Judul Artikel --}}
                            <a href="/article/{{$post->slug}}" class="hover:underline">
                                <h3 class="text-lg font-semibold capitalize">{{ $post->title }}</h3>
                            </a>
        
                            {{-- Informasi Penulis dan Waktu --}}
                            <div class="mt-2 text-sm">
                                <span>Oleh {{ $post->author->name }}</span> 
                                | {{ $post->created_at->diffForHumans() }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
    </div>
</x-layout>
