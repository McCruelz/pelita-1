<x-layout>
    <x-slot:title> {{$title}} </x-slot:title>
    <article class="py-8 max-w-screen-md border-b">

        <a href="{{route ('articles')}}" class="font-medium text-white">
            <button class="bg-purple-400 rounded-lg p-2 hover:bg-purple-300">&laquo; Kembali ke Artikel</button>
        </a>

        @if($post->image)
            <div class="relative w-full h-80 overflow-hidden rounded-2xl shadow-xl mt-10">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post['title'] }}" class="object-fill">
            </div>
        @endif

        <h2 class="mt-5 mb-1 text-3xl tracking-tight font-bold text-gray-900 capitalize">{{ $post['title']}}</h2>
        
        <div class="text-base text-gray-500">
            <a> Oleh {{$post->author->name}}</a> | {{$post->created_at->format('l, d F Y')}}
        </div>
        
        <p class="my-4 font-light">{{$post['body']}}</p>
        
    </article>
</x-layout>