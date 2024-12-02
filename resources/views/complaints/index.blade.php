<x-layout title="Daftar Aduan">
    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Daftar Laporan Pengaduan Anda</h2>
            
            <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
                <table class="min-w-full table-auto">
                    <thead class="bg-purple-600 text-white">
                        <tr>
                            <th class="py-3 px-4 border-b">No</th>
                            <th class="py-3 px-4 border-b">Deskripsi Laporan</th>
                            <th class="py-3 px-4 border-b text-center">Status</th> <!-- Rata Tengah -->
                            <th class="py-3 px-4 border-b text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($complaints as $complaint)
                            <tr class="hover:bg-gray-100 transition duration-200">
                                <td class="py-3 px-4 border-b text-center">{{ $loop->iteration }}</td> <!-- Rata Tengah -->
                                <td class="py-3 px-4 border-b">{{ Str::limit($complaint->deskripsi_laporan, 50) }}</td>
                                <td class="py-3 px-4 border-b text-center"> <!-- Rata Tengah -->
                                    <span class="inline-block py-1 px-3 items-center text-sm font-semibold rounded-full 
                                        {{ $complaint->status_laporan === 'selesai' ? 'bg-green-200 text-green-800' : 
                                           ($complaint->status_laporan === 'proses' ? 'bg-yellow-200 text-yellow-800' : 
                                           'bg-red-200 text-red-800') }}">
                                        {{ ucfirst($complaint->status_laporan) }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 border-b text-center"> <!-- Rata Tengah -->
                                    <a href=" {{ route('complaints.show', $complaint) }}" 
                                       class="bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200">
                                        Lihat Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-layout>
