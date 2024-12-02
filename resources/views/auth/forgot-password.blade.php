<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Berikan email Anda yang telah terdaftar untuk mereset password.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-text-input placeholder="Email" id="email" class="block mt-1 w-full text-center" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>

        <div class="mt-4">    
            <a href="/">
                <x-secondary-button>
                    {{ __('Kembali ke Home') }}
                </x-secondary-button>
            </a>
        </div>
        
        <div class="mt-4">    
            <a href="/login">
                <x-secondary-button>
                    {{ __('Kembali ke Halaman Login') }}
                </x-secondary-button>
            </a>
        </div>
    </form>
</x-guest-layout>
