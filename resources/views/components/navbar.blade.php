<nav class="bg-white" x-data="{ isOpen: false }">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">
      
      <!-- Logo -->
      <a href="/">
        <div class="flex items-center space-x-3">
          <span class="text-2xl font-laila text-purple-700 font-medium">PELITA</span>
          <div class="flex-shrink-0">
            <img class="h-8 w-8" src="/img/Logo.svg" alt="PELITA">
          </div>
        </div>
      </a>

      <!-- Centered Navigation Links -->
      <div class="flex flex-1 justify-center">
        <div class="ml-10 flex items-baseline space-x-10">
          <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
          <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
          <x-nav-link href="/articles" :active="request()->is('articles')">Artikel</x-nav-link>
        </div>
      </div>

      <div class="relative ml-3 flex items-center space-x-3">
      <!-- Right-aligned Login/Logout and Profile -->
      @if (Route::has('login'))
              @auth
              <div class="relative ml-3">
                <h1>Halo, {{Auth::user()->name}}</h1>
              </div>
              <div class="relative ml-3">
                <div>
                  <button type="button" @click="isOpen = !isOpen" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">Open user menu</span>
                    <x-avatar>8</x-avatar>
                  </button>
                </div>

                <div 
                  x-show="isOpen"
                  @click.away="isOpen = false"
                  x-transition:enter="transition ease-out duration-100 transform"
                  x-transition:enter-start="opacity-0 scale-95"
                  x-transition:enter-end="opacity-100 scale-100"
                  x-transition:leave="transition ease-in duration-75 transform"
                  x-transition:leave-start="opacity-100 scale-100"
                  x-transition:leave-end="opacity-0 scale-95"
                  class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-purple-500 ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                  <!-- Profile dropdown options -->
                  <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>

                   <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                </div>
              </div>
              @else
              <x-nav-link class="bg-purple-500 rounded-md p-1 hover:bg-purple-400" href="{{route ('login')}}" :active="request()->is('login')"><span class="text-white p-4">Log In</span></x-nav-link>
              @if (Route::has('register'))
                  <x-nav-link class="bg-gray-200 rounded-md p-1 hover:bg-gray-100" href="{{route ('register')}}" :active="request()->is('register')"><span class="text-black p-4">Daftar</span></x-nav-link>
              @endif
              @endauth
      @endif
    </div>
    </div>
  </div>
</nav>
