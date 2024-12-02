<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">Edit Profil</h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information, email address, and other details.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="grid md:grid-cols-3 grid-cols-1 gap-4">    
            <!-- Profile Picture -->
            <div class="bg-gradient-to-r from-yellow-100 to-purple-400 rounded-2xl flex flex-col items-center p-6 shadow-md">
                <img 
                    class="h-40 w-40 rounded-full object-cover" 
                    src="{{ Auth::user() && Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : asset('img/default-avatar.png') }}" 
                    alt="Profile Picture"
                />
                <div class="mt-4 w-full">
                    <label for="profile_image" class="block text-md font-medium text-gray-700">Upload Foto Baru <a class="italic text-xs">*Ukuran maks. 2MB</a></label>
                    <input 
                        id="profile_image" 
                        name="profile_image" 
                        type="file"
                        class="w-full px-4 py-2 border rounded-full focus:outline-none focus:ring-2 focus:ring-purple-500"
                    />
                    <x-input-error class="mt-2" :messages="$errors->get('profile_image')" />
                </div>
                {{-- Tombol --}}
                <div class="space-y-4 mt-4 w-full">
                    <!-- Save Changes -->
                        <button type="submit" class="bg-green-500 text-white rounded-full px-4 py-2 w-full">
                            Konfirmasi
                        </button>
                
                    <!-- Delete Profile Picture -->
                    <button 
                        x-data=""
                        type="button" 
                        class="block bg-red-500 hover:bg-red-400 text-white rounded-full px-4 py-2 w-full"
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-profile-image-deletion'); console.log('Modal Triggered');">
                        Hapus Foto Profil
                    </button>
                    
                
                    <!-- Back Button -->
                    <a href="{{ route('profile.show') }}" class="bg-purple-500 hover:bg-purple-400 text-white rounded-full px-4 py-2 w-full text-center block">
                        Kembali
                    </a>
                </div>                
            </div>

            <div class="rounded-lg space-y-10">
                <!-- Username -->
                <div>
                    <x-input-block
                        name="username"
                        label="Username"
                        :value="$user->username"
                        required
                        placeholder="Masukkan username Anda"
                    />
                </div>

                <!-- Gender -->
                <div class="bg-white bg-gradient-to-r from-yellow-100 to-purple-400 rounded-2xl shadow-md p-6">
                    <div class="mt-4 mb-4">
                        <label class="block text-md font-medium text-gray-700">{{ __('Gender') }}</label>
                        <div class="mt-1 flex items-center space-x-4">
                            <label class="inline-flex items-center">
                                <input 
                                    type="radio" 
                                    name="gender" 
                                    value="Male" 
                                    class="form-radio h-4 w-4 text-indigo-600"
                                    {{ old('gender', $user->gender) === 'Male' ? 'checked' : '' }} 
                                />
                                <span class="ml-2 text-sm text-gray-600">{{ __('Male') }}</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input 
                                    type="radio" 
                                    name="gender" 
                                    value="Female" 
                                    class="form-radio h-4 w-4 text-indigo-600"
                                    {{ old('gender', $user->gender) === 'Female' ? 'checked' : '' }} 
                                />
                                <span class="ml-2 text-sm text-gray-600">{{ __('Female') }}</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input 
                                    type="radio" 
                                    name="gender" 
                                    value="" 
                                    class="form-radio h-4 w-4 text-gray-400"
                                    {{ old('gender', $user->gender) === null ? 'checked' : '' }} 
                                />
                                <span class="ml-2 text-sm text-gray-400 italic">{{ __('Kosongkan pilihan') }}</span>
                            </label>
                        </div>
                    </div>
                </div>
               
                <!-- Email -->
                <div>
                    <x-input-block
                        name="email"
                        label="Email"
                        type="email"
                        :value="$user->email"
                        required
                        placeholder="Masukkan email Anda"
                    />
                </div>                

            </div>

            <div class="rounded-lg space-y-10">
                <!-- Name -->
                <div>
                    <x-input-block
                        name="name"
                        label="Name"
                        :value="$user->name"
                        placeholder="Masukkan nama Anda"
                    />
                </div>

                <!-- Phone Number -->
                <div>
                    <x-input-block
                        name="phone_number"
                        label="Phone Number"
                        :value="$user->phone_number"
                        placeholder="Masukkan nomor telepon Anda"
                    />
                </div>

                <!-- Address -->
                <div>
                    <x-input-block
                        name="address"
                        label="Alamat"
                        :value="$user->address"
                        placeholder="Masukkan alamat Anda"
                    />
                </div>

            </div>
        </div>
        {{-- errors --}}
        <div class="w-full text-center flex flex-col items-center">
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
            <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
            <x-input-error class="mt-2" :messages="$errors->get('gender')" />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>
    </form>

        <!-- Modal Konfirmasi Hapus Foto Profil -->
        <x-modal name="confirm-profile-image-deletion" :show="$errors->profileImageDeletion->isNotEmpty()" focusable>
            <form method="post" action="{{ route('profile.deleteImage') }}" class="p-6">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium text-gray-900 text-center">
                    {{ __('Apakah Anda yakin ingin menghapus foto profil?') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 text-center">
                    {{ __('Foto profil Anda akan dihapus secara permanen. Perubahan ini tidak dapat dibatalkan.') }}
                </p>

                <!-- Tombol Konfirmasi dan Batal -->
                <div class="mt-6 flex justify-between space-x-4">
                    <button class="rounded-lg flex-1 text-center bg-gray-200 hover:bg-gray-100" x-on:click="$dispatch('close')">
                        <p class="p-4">Batalkan</p>
                    </button>
                    <button class="rounded-lg flex-1 text-center bg-red-500 hover:bg-red-400">
                        <p class="p-4 text-white">Hapus Foto Profil</p>
                    </button>
                </div>
                
            </form>
        </x-modal>
</section>