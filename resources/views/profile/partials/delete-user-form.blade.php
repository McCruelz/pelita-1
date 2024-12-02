<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 text-center">
            Hapus Akun
        </h2>

        <p class="mt-1 text-sm text-gray-600 text-center">
            Ketika akun dihapus, semua data di akun PELITA Anda akan hilang. Hal ini tidak dapat diurungkan.
        </p>
    </header>

    <x-danger-button
        class="flex justify-center rounded-full w-full"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        HAPUS AKUN
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Apakah Anda yakin ingin menghapus akun?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
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
                <button class="rounded-lg flex-1 text-center bg-gray-200 hover:bg-gray-100" x-on:click="$dispatch('close')">
                    <p class="p-4">Batalkan</p>
                </button>
                <button class="rounded-lg flex-1 text-center bg-red-500 hover:bg-red-400">
                    <p class="p-4 text-white">HAPUS AKUN</p>
                </button>
            </div>
        </form>
    </x-modal>
</section>
