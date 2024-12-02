<x-app-layout>
    <section class="bg-gray-100 py-8">
        <div class="container mx-auto max-w-6xl bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Daftar Laporan Pengaduan</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="py-3 px-4 border-b">No</th>
                            <th class="py-3 px-4 border-b">Deskripsi Laporan</th>
                            <th class="py-3 px-4 border-b text-center">Status</th> <!-- Rata Tengah -->
                            <th class="py-3 px-4 border-b text-center">Aksi</th>   <!-- Rata Tengah -->
                        </tr>
                    </thead>
                    <tbody>
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
                                    <a href="{{ route('admin.complaints.show', $complaint->id_laporan) }}" 
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
</x-app-layout>
