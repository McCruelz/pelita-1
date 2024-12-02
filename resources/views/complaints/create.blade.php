<x-layout title="Pengaduan">
    <section class="py-10">
        <div class="max-w-3xl mx-auto bg-white p-8 shadow-lg rounded-lg">
            <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">Buat Laporan Pengaduan</h2>

            <form action="{{ route('complaints.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-6">
                    <label for="deskripsi_laporan" class="block text-gray-700 font-medium">Deskripsi Laporan</label>
                    <textarea id="deskripsi_laporan" name="deskripsi_laporan" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" rows="6" required maxlength="500"></textarea>
                </div>

                <div class="mb-6">
                    <label for="bukti_laporan" class="block text-gray-700 font-medium">Bukti Laporan (opsional)</label>
                    <input type="file" id="bukti_laporan" name="bukti_laporan" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>

                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 transition duration-300">Kirim Laporan</button>
            </form>
        </div>
    </section>
</x-layout>
