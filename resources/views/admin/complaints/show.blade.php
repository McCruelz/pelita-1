<x-app-layout>
    <section class="bg-gray-100 py-8">
        <div class="container mx-auto max-w-4xl bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-3xl font-bold mb-6 text-gray-800">Detail Laporan Pengaduan</h2>
            
            <!-- Deskripsi Laporan -->
            <div class="mb-6">
                <h3 class="text-xl font-semibold text-gray-700">Deskripsi Laporan:</h3>
                <p class="mt-2 text-gray-600">{{ $complaint->deskripsi_laporan }}</p>
            </div>
            
            <!-- Status Laporan -->
            <div class="mb-6">
                <h3 class="text-xl font-semibold text-gray-700">Status:</h3>
                <form action="{{ route('admin.complaints.update', $complaint->id_laporan) }}" method="POST" class="mt-2">
                    @csrf
                    @method('PATCH')
                    <select name="status_laporan" id="status_laporan" class="block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="pending" {{ old('status_laporan', $complaint->status_laporan) === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="proses" {{ old('status_laporan', $complaint->status_laporan) === 'proses' ? 'selected' : '' }}>Proses</option>
                        <option value="selesai" {{ old('status_laporan', $complaint->status_laporan) === 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                    <button type="submit" class="mt-4 w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700 transition duration-200">Update Status</button>
                </form>
            </div>
            
            <!-- Bukti Laporan (Jika ada) -->
            @if ($complaint->bukti_laporan)
                <div class="mb-6">
                    <h3 class="text-xl font-semibold text-gray-700">Bukti Laporan:</h3>
                    <p class="mt-2 text-gray-600">Klik di bawah ini untuk melihat bukti laporan:</p>
                    <a href="{{ Storage::url($complaint->bukti_laporan) }}" class="text-blue-500 hover:underline" target="_blank">Lihat Bukti</a>
                </div>
            @endif
            
            <!-- Tombol Kembali -->
            <div class="mt-6">
                <a href="{{ route('admin.complaints.index') }}" class="inline-block text-center w-full bg-gray-500 text-white font-semibold py-2 rounded-md hover:bg-gray-600 transition duration-200">Kembali ke Daftar Laporan</a>
            </div>
        </div>
    </section>
</x-app-layout>