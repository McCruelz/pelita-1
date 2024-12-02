<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                {{-- Selamat Datang --}}
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">
                        Selamat datang, {{ Auth::user()->name }}!
                    </h1>
                    <p class="text-gray-600">
                        {{ __("Selamat datang di Dashboard Admin. Kelola artikel dan komplain Anda dengan mudah.") }}
                    </p>
                </div>

                {{-- Tombol Aksi --}}
                <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                    {{-- Button Create Posts --}}
                    <a href="{{ route('admin.posts.create') }}"
                        class="flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg shadow transition duration-200">
                        <span>Create Posts</span>
                    </a>

                    {{-- Button See Posts --}}
                    <a href="{{ route('admin.posts.index') }}"
                        class="flex items-center justify-center bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-lg shadow transition duration-200">
                        <span>See Posts</span>
                    </a>

                    {{-- Button See Complaints --}}
                    <a href="{{ route('admin.complaints.index') }}"
                        class="flex items-center justify-center bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-3 px-6 rounded-lg shadow transition duration-200">
                        <span>See Complaints</span>
                    </a>

                    {{-- Button Logout --}}
                    <form method="POST" action="{{ route('admin.logout') }}" class="flex items-center justify-center">
                        @csrf
                        <button type="submit"
                                class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-3 px-6 rounded-lg shadow transition duration-200">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
