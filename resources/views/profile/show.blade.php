<x-layout title="profil">
        <div class="mx-5 bg-gradient-to-r from-yellow-100 via-pink-300 to-purple-400 rounded-2xl p-6 flex space-x-5 items-center">
            <div class="">
                <h1 class="text-3xl font-bold text-gray-800">Hey, {{ $user->name }}!</h1>
                <p class="text-lg text-gray-600 mt-2">Sudah tersenyumkah hari ini?</p>
            </div>
        </div>
        
        <div class="mt-6 mb-6">
            <h1 class="text-6xl font-bold">User Profile</h1>
        </div>

        <!-- Bagian Profil -->
        <div class="grid md:grid-cols-3 grid-cols-1 gap-4 ">
            <!-- Kolom 1: Foto Profil -->
            <div class="bg-gradient-to-r from-yellow-100 to-purple-400 rounded-2xl flex flex-col items-center p-4 shadow-md">
                <img 
                    class=" h-40 w-40 rounded-full object-cover" 
                    src="{{ Auth::user() && Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : asset('img/default-avatar.png') }}" 
                    alt="Profile Picture">
                <p class="text-4xl font-bold text-gray-800 mt-4">{{ $user->name }}</p>
                <p class="text-sm text-gray-600">ID - {{ $user->id }}</p>
                
                <a class="mt-8 w-full" href="{{ route('profile.edit') }}">
                    <button class="bg-purple-500 hover:bg-purple-400 text-white rounded-full px-4 py-2 w-full text-center block">Edit Profil</button>
                </a>

                <button 
                    class="mt-4 text-white rounded-full px-4 py-2 w-full text-center block bg-red-600 hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
                    
                    HAPUS AKUN
                </button>
            </div>

            <!-- Kolom 2: Informasi -->
            <div class="rounded-lg space-y-10">
                <!-- Username -->
                <x-blocks title="{{$user->username}}">Username</x-blocks>
                <!-- Gender -->
                <x-blocks title="{{$user->gender}}">Jenis Kelamin</x-blocks>
                <!-- Email -->
                <x-blocks title="{{$user->email}}">E-mail</x-blocks>
            </div>

            <!-- Kolom 3: Alamat -->
            <div class="rounded-lg space-y-10">
                <!-- Name -->
                <x-blocks title="{{$user->name}}">Nama</x-blocks>
                <!-- Phone Number -->
                <x-blocks title="{{$user->phone_number}}">No. Telepon</x-blocks>
                <!-- Address -->
                <x-blocks title="{{$user->address}}">Alamat</x-blocks>
            </div>
        </div>

        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                @csrf
                @method('delete')
    
                <h2 class="text-lg font-medium text-gray-900 text-center">
                    {{ __('Apakah Anda yakin ingin menghapus akun?') }}
                </h2>
    
                <p class="mt-1 text-sm text-gray-600 text-center">
                    {{ __('Ketika akun dihapus, semua data di akun PELITA Anda akan hilang. Hal ini tidak dapat diurungkan. Masukkan password anda untuk mengonfirmasi penghapusan akun.') }}
                </p>
    
                <div class="mt-6">
                    <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
    
                    <x-text-input
                        id="password"
                        name="password"
                        type="password"
                        class="mt-1 block w-3/4"
                        placeholder="{{ __('Password') }}"
                    />
    
                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                </div>
    
                <div class="mt-6 flex justify-between space-x-4">
                    <button class="rounded-full flex-1 text-center bg-gray-200 hover:bg-gray-100" x-on:click="$dispatch('close')">
                        <p class="p-4">Batalkan</p>
                    </button>
                    <button class="rounded-full flex-1 text-center bg-red-500 hover:bg-red-400">
                        <p class="p-4 text-white">HAPUS AKUN</p>
                    </button>
                </div>
            </form>
        </x-modal>

        @include('complaints.index')
</x-layout> 