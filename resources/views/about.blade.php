<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mx-auto px-4 py-12">

        <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2">
            <div class="">
                <section class="p-4">
                    <h2 class="text-3xl font-bold mb-4 flex">Tentang 
                        <div class="flex items-center space-x-3">
                        <span class="text-3xl ml-3  font-laila text-purple-700 font-medium">PELITA</span>
                            <div class="flex-shrink-0">
                                <img class=" h-10 w-10" src="/img/Logo.svg" alt="PELITA">
                            </div>
                        </div>
                    </h2>
                    <p class="text-lg text-gray-700 leading-relaxed text-justify">
                        PELITA adalah platform yang menyediakan edukasi, pelaporan kasus kekerasan seksual secara aman, dan dukungan bagi korban. Dengan visi menciptakan ruang aman dan mudah diakses, PELITA bertujuan memberdayakan masyarakat untuk mencegah dan mengatasi kekerasan seksual melalui informasi, artikel edukatif, dan kampanye kesadaran publik.
                    </p>
                </section>
            </div>
            
            <div>
                <img src="/img/about.jpg" alt="" class="max-h-full mt-16 rounded-xl shadow-xl">
            </div>

            <div class="mt-5">
                <section class="p-2">
                    <h2 class="text-2xl font-bold text-secondary mb-4 text-center">Visi</h2>
                    <p class="text-lg text-gray-700 leading-relaxed text-justify p-2">
                        Visi PELITA adalah untuk menciptakan sebuah platform yang aman dan dapat diakses oleh semua orang untuk memberikan edukasi, pelaporan kasus kekerasan seksual, serta dukungan bagi korban. Kami berkomitmen untuk memberdayakan masyarakat dengan pengetahuan dan informasi yang relevan dalam upaya mencegah dan mengatasi kekerasan seksual.
                    </p>
                </section>
            </div>

            <div class="mt-5">
                <section class="p-2">
                    <h2 class="text-2xl font-bold text-secondary mb-4 text-center">Misi</h2>
                    <ul class="space-y-3 text-lg text-gray-700 p-2">
                        <li class="flex items-start text-justify">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-8 text-primary mr-3" fill="none" viewBox="0 0 24 24" stroke="green">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="5" d="M5 12l5 5L19 7" />
                            </svg>
                            Memberikan akses mudah bagi korban kekerasan seksual untuk melaporkan kejadian secara aman dan anonim.
                        </li>
                        <li class="flex items-start text-justify">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-8 text-primary mr-3" fill="none" viewBox="0 0 24 24" stroke="green">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="5" d="M5 12l5 5L19 7" />
                            </svg>
                            Menyediakan artikel edukatif yang dapat meningkatkan kesadaran dan pemahaman tentang kekerasan seksual dan pencegahannya.
                        </li>
                        <li class="flex items-start text-justify">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-8 text-primary mr-3" fill="none" viewBox="0 0 24 24" stroke="green">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="5" d="M5 12l5 5L19 7" />
                            </svg>
                            Menjamin keamanan data pengguna dan memberikan informasi yang berguna mengenai hak-hak korban serta prosedur hukum yang dapat ditempuh.
                        </li>
                        <li class="flex items-start text-justify">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-8 text-primary mr-3" fill="none" viewBox="0 0 24 24" stroke="green">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="5" d="M5 12l5 5L19 7" />
                            </svg>
                            Memberikan platform untuk memperluas jangkauan dukungan bagi korban melalui kampanye dan penggalangan kesadaran publik.
                        </li>
                    </ul>
                </section>
            </div>
        </div>
            

            <section class="mt-10">
                <h2 class="text-2xl font-bold text-center mb-4">Tim Kami</h2>
                <p class="text-lg text-gray-700 mb-6 text-center">
                    PELITA didirikan oleh sekumpulan individu yang berkomitmen untuk memberikan dukungan bagi korban kekerasan seksual dan memerangi ketidakadilan. Tim kami terdiri dari berbagai profesional, termasuk ahli hukum, pekerja sosial, psikolog, dan pengembang teknologi yang memiliki keahlian dalam menyediakan solusi berbasis teknologi untuk masalah sosial.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                    <div class="text-center">
                        <div class="">
                            <img src="/img/ghaniya.jpg" alt="Ghaniya" class="w-24 h-24 mx-auto mb-4 rounded-full flex items-start justify-center">
                        </div>
                        <p class="font-semibold text-xl text-gray-800">Ghaniya Putri</p>
                        <p class="text-gray-600">CEO & Pendiri</p>
                    </div>
                    <div class="text-center">
                        <div>
                            <img src="/img/nanad.jpg" alt="Nadya Charrisa" class="w-24 h-24 mx-auto mb-4 rounded-full flex items-start justify-center">
                        </div>
                        <p class="font-semibold text-xl text-gray-800">Nadya Charrisa</p>
                        <p class="text-gray-600">Ahli Hukum & Penasihat Hukum</p>
                    </div>
                    <div class="text-center">
                        <div class="w-24 h-24 mx-auto mb-4 bg-gray-100 rounded-full flex items-start justify-center">
                            <img src="https://via.placeholder.com/100" alt="Maria Johnson" class="rounded-full">
                        </div>
                        <p class="font-semibold text-xl text-gray-800">Maria Johnson</p>
                        <p class="text-gray-600">Psikolog & Penasihat Korban</p>
                    </div>
                    <div class="text-center">
                        <div class="w-24 h-24 mx-auto mb-4 bg-gray-100 rounded-full flex items-start justify-center">
                            <img src="https://via.placeholder.com/100" alt="Mark Williams" class="rounded-full">
                        </div>
                        <p class="font-semibold text-xl text-gray-800">Mark Williams</p>
                        <p class="text-gray-600">CTO & Pengembang Sistem</p>
                    </div>
                    
                </div>
            </section>

            <section class="mt-10">
                <h2 class="text-2xl font-bold mb-4 text-center">Informasi Penting</h2>
                <p class="text-lg text-gray-700 mb-4 text-justify">
                    PELITA berkomitmen untuk menjaga kerahasiaan dan privasi pengguna. Semua data yang diterima melalui pengaduan atau registrasi akan dijaga dengan sangat hati-hati dan hanya digunakan untuk tujuan yang sah.
                </p>
                <p class="text-lg text-gray-700 text-justify">
                    Kami juga bekerja sama dengan berbagai lembaga pemerintah dan organisasi non-pemerintah untuk meningkatkan efektivitas program-program kami dalam mengatasi kekerasan seksual dan memberikan dukungan bagi korban.
                </p>
            </section>
    </div>
</x-layout>
