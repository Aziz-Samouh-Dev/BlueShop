<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/dashboard') }}" class="flex items-center h-10">
                        <img src="{{ asset('logo2.png') }}" class="h-10" alt="">
                    </a>
                </div>


                @auth
                    @if (Auth::user()->role === 'user')
                        <div class="space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link :href="url('/orders')" :active="request()->routeIs('orders')">
                                {{ __('Orders') }}
                            </x-nav-link>
                        </div>
                    @else
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link :href="url('/dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link :href="url('/categorys')" :active="request()->routeIs('categorys')">
                                {{ __('Categorys') }}
                            </x-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link :href="url('/products')" :active="request()->routeIs('products')">
                                {{ __('Products') }}
                            </x-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link :href="url('/users')" :active="request()->routeIs('users')">
                                {{ __('users') }}
                            </x-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link :href="url('/orders')" :active="request()->routeIs('orders')">
                                {{ __('Orders') }}
                            </x-nav-link>
                        </div>
                    @endif
                @endauth

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div class="relative">

                                <img class="object-cover w-10 h-10 rounded-full ring ring-gray-300"
                                    src="{{ asset('usersImg/' . Auth::user()->image) }}" alt="User Image">

                                <span
                                    class="absolute bottom-0 right-0 w-3 h-3 rounded-full bg-emerald-500 ring-1 ring-white"></span>
                            </div>

                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <div
                            class="flex items-center p-3 -mt-2 text-sm text-gray-600 transition-colors duration-300 transform">
                            <div class="mx-1">
                                <h1 class="text-sm font-semibold text-gray-700 ">
                                    {{ Auth::user()->name }}
                                </h1>
                                <p class="text-sm text-gray-500 ">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        <hr>
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('home.index')">
                            {{ __('Home') }}
                        </x-dropdown-link>

                        @auth
                            @if (Auth::user()->role === 'user')
                                <x-dropdown-link :href="route('orders.index')">
                                    {{ __('Orders') }}
                                    </x-nav-link>
                                @else
                                    <x-dropdown-link :href="route('dashboard.index')">

                                        {{ __('Dashboard') }}
                                    </x-dropdown-link>
                            @endif
                        @endauth

                        <hr>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>


            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="url('/dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>


                @auth
                    @if (Auth::user()->role === 'user')
                        <x-dropdown-link :href="route('orders.index')">
                            {{ __('Orders') }}
                            </x-nav-link>
                        @else
                            <x-dropdown-link :href="route('dashboard.index')">

                                {{ __('Dashboard') }}
                            </x-dropdown-link>
                    @endif
                @endauth

                <!-- Authentication -->
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
    </div>
</nav>
