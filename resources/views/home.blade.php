<x-layout>
    <x-slot:title> {{$title}} </x-slot:title>

    {{-- Hero Section --}}
    <section class="bg-gradient-to-b max-w-7xl from-purple-200 to-pink-200 py-12 rounded-3xl">
        <div class="container mx-auto flex flex-col items-center text-center md:flex-row md:text-left md:items-center md:space-x-8 px-10">
            <div class="">
                <h1 class=" inline-block mt-6 px-6 rounded-full text-xl mb-9 bg-white/50 text-gray-900 font-semibold">#1 Perlindungan Kekerasan Seksual</h1>
                <h2 class=" text-5xl font-medium text-gray-900 mt-2">Tempat <span class="font-bold text-purple-700">Perlindungan</span> <br> dari Kekerasan Seksual <br>Pertama di Indonesia</h2>
                <p class="text-gray-700 mt-4">
                    Segera mulai konsultasi Anda dengan kami, dapatkan dukungan profesional dan solusi aman untuk melindungi diri dari kekerasan seksual.
                </p>
                <a href="/complaints/create" class="mt-6 inline-block bg-purple-500 text-white py-2 px-6 rounded-full hover:bg-purple-600">Buat Jadwal</a>
            </div>
            <div class=" mt-8 md:mt-0 flex justify-center -mb-12">
                <img src="/img/dokter.png">
            </div>
        </div>
    </section>

    {{-- Services Section --}}
    <section class="container mt-4 max-w-7xl">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 justify">
            <a href="">
                <div class="container mx-auto flex-col bg-purple-300 text-center rounded-3xl aspect-square flex items-center justify-center bg-cover bg-center" style="background-image: url('/img/konsul.jpg')">
                    
                    <h3 class="text-xl font-semibold text-white">Pengaduan</h3>
                </div>
            </a>
            
            <a href="/articles">
                <div class="container mx-auto flex-col bg-purple-300 text-center rounded-3xl aspect-square flex items-center justify-center bg-cover bg-center" style="background-image: url('/img/artikel.jpg')">
                    <h3 class="text-xl font-semibold text-white">Artikel</h3>
                </div>
            </a>

        </div>
    </section>
  

</x-layout>
