<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('admin.dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                @auth('admin') <!-- Tampilkan hanya untuk admin yang login -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <!-- Dashboard -->
                    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <!-- Create Post -->
                    <x-nav-link :href="route('admin.posts.create')" :active="request()->routeIs('admin.posts.create')">
                        {{ __('Create Post') }}
                    </x-nav-link>
                    <!-- See Post -->
                    <x-nav-link :href="route('admin.posts.index')" :active="request()->routeIs('admin.posts.index')">
                        {{ __('See Posts') }}
                    </x-nav-link>
                </div>
                @endauth
            </div>

            <!-- Admin Name and Logout -->
            <div class="hidden sm:flex sm:items-center space-x-4">
                @auth('admin') <!-- Tampilkan hanya untuk admin yang login -->
                <!-- Admin Name -->
                <div class="text-gray-800 text-sm font-medium">
                    {{ Auth::guard('admin')->user()->name }}
                </div>

                <!-- Logout Button -->
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" 
                        class="bg-red-500 hover:bg-red-600 text-white text-sm font-semibold py-2 px-4 rounded-md shadow">
                        {{ __('Log Out') }}
                    </button>
                </form>
                @endauth
            </div>

            <!-- Hamburger Menu -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @auth('admin') <!-- Tampilkan hanya untuk admin yang login -->
            <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.posts.create')" :active="request()->routeIs('admin.posts.create')">
                {{ __('Create Post') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.posts.index')" :active="request()->routeIs('admin.posts.index')">
                {{ __('See Posts') }}
            </x-responsive-nav-link>
            @endauth
        </div>

        <!-- Responsive Logout Button -->
        @auth('admin') <!-- Tampilkan hanya untuk admin yang login -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::guard('admin')->user()->name }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @endauth
    </div>
</nav>
