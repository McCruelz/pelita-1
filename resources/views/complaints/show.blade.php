<x-layout title="Aduan">
    <section class="py-12">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-semibold text-gray-800 mb-6">Deskripsi Laporan Pengaduan</h2>

            <div class="bg-white p-6 rounded-lg shadow-lg">
                <p class="text-lg text-gray-700 mb-4"><strong class="font-medium">Deskripsi:</strong> {{ $complaint->deskripsi_laporan }}</p>
                
                <p class="text-lg text-gray-700 mb-4">
                    <strong class="font-medium">Status:</strong> 
                    <span class="inline-block py-1 px-3 items-center text-sm font-semibold rounded-full 
                                        {{ $complaint->status_laporan === 'selesai' ? 'bg-green-200 text-green-800' : 
                                           ($complaint->status_laporan === 'proses' ? 'bg-yellow-200 text-yellow-800' : 
                                           'bg-red-200 text-red-800') }}">
                                        {{ ucfirst($complaint->status_laporan) }}
                                    </span>
                </p>

                <p class="text-lg text-gray-700 mb-4">
                    <strong class="font-medium">Bukti Laporan:</strong>
                    @if ($complaint->bukti_laporan)
                        <a href="{{ Storage::url($complaint->bukti_laporan) }}" target="_blank" class="text-blue-600 hover:underline">
                            Lihat Bukti
                        </a>
                    @else
                        Tidak ada bukti yang disertakan
                    @endif
                </p>

                <!-- Tombol Kembali -->
                <div class="mt-6">
                    <a href="{{ url()->previous() }}" class="inline-block px-6 py-3 text-sm font-semibold text-white bg-gray-600 hover:bg-gray-700 rounded-lg transition duration-200">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layout>
