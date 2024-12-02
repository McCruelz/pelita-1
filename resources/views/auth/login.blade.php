<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address or Username -->
        <div>
            <x-text-input placeholder="E-mail atau Username" id="login" class="block mt-1 w-full" type="text" name="login" :value="old('login')" required autofocus />
            <x-input-error :messages="$errors->get('login')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-text-input placeholder="Password" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 hover:text-gray-900 hover:underline rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Lupa Password? Klik di sini') }}
                </a>
            @endif
        </div>

        <x-primary-button class="block mt-4">
            {{ __('Log in') }}
        </x-primary-button>
        <a href="/">
            <x-secondary-button class="block mt-4">
                {{ __('Kembali ke Home') }}
            </x-secondary-button>
        </a>
        <span class="block text-sm text-gray-600 mt-4">
            Belum Memiliki Akun? <a class="hover:underline font-bold" href="/register">Daftar Sekarang!</a>
        </span>

       
        
    </form>
</x-guest-layout>
