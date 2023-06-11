<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">

    <!-- Scripts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .body-bg {
            background-color: #9921e8;
            background-image: linear-gradient(315deg, #9921e8 0%, #5f72be 74%);
        }
    </style>


    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    {{-- <div
        class="relative sm:flex sm:justify-center sm:items-center bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div> --}}



    <div id="app">

        <nav x-data="{ open: false }" class="bg-white border-gray-200 ">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="" class="flex items-center">
                    <svg viewBox="0 0 316 316" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8">
                        <path
                            d="M305.8 81.125C305.77 80.995 305.69 80.885 305.65 80.755C305.56 80.525 305.49 80.285 305.37 80.075C305.29 79.935 305.17 79.815 305.07 79.685C304.94 79.515 304.83 79.325 304.68 79.175C304.55 79.045 304.39 78.955 304.25 78.845C304.09 78.715 303.95 78.575 303.77 78.475L251.32 48.275C249.97 47.495 248.31 47.495 246.96 48.275L194.51 78.475C194.33 78.575 194.19 78.725 194.03 78.845C193.89 78.955 193.73 79.045 193.6 79.175C193.45 79.325 193.34 79.515 193.21 79.685C193.11 79.815 192.99 79.935 192.91 80.075C192.79 80.285 192.71 80.525 192.63 80.755C192.58 80.875 192.51 80.995 192.48 81.125C192.38 81.495 192.33 81.875 192.33 82.265V139.625L148.62 164.795V52.575C148.62 52.185 148.57 51.805 148.47 51.435C148.44 51.305 148.36 51.195 148.32 51.065C148.23 50.835 148.16 50.595 148.04 50.385C147.96 50.245 147.84 50.125 147.74 49.995C147.61 49.825 147.5 49.635 147.35 49.485C147.22 49.355 147.06 49.265 146.92 49.155C146.76 49.025 146.62 48.885 146.44 48.785L93.99 18.585C92.64 17.805 90.98 17.805 89.63 18.585L37.18 48.785C37 48.885 36.86 49.035 36.7 49.155C36.56 49.265 36.4 49.355 36.27 49.485C36.12 49.635 36.01 49.825 35.88 49.995C35.78 50.125 35.66 50.245 35.58 50.385C35.46 50.595 35.38 50.835 35.3 51.065C35.25 51.185 35.18 51.305 35.15 51.435C35.05 51.805 35 52.185 35 52.575V232.235C35 233.795 35.84 235.245 37.19 236.025L142.1 296.425C142.33 296.555 142.58 296.635 142.82 296.725C142.93 296.765 143.04 296.835 143.16 296.865C143.53 296.965 143.9 297.015 144.28 297.015C144.66 297.015 145.03 296.965 145.4 296.865C145.5 296.835 145.59 296.775 145.69 296.745C145.95 296.655 146.21 296.565 146.45 296.435L251.36 236.035C252.72 235.255 253.55 233.815 253.55 232.245V174.885L303.81 145.945C305.17 145.165 306 143.725 306 142.155V82.265C305.95 81.875 305.89 81.495 305.8 81.125ZM144.2 227.205L100.57 202.515L146.39 176.135L196.66 147.195L240.33 172.335L208.29 190.625L144.2 227.205ZM244.75 114.995V164.795L226.39 154.225L201.03 139.625V89.825L219.39 100.395L244.75 114.995ZM249.12 57.105L292.81 82.265L249.12 107.425L205.43 82.265L249.12 57.105ZM114.49 184.425L96.13 194.995V85.305L121.49 70.705L139.85 60.135V169.815L114.49 184.425ZM91.76 27.425L135.45 52.585L91.76 77.745L48.07 52.585L91.76 27.425ZM43.67 60.135L62.03 70.705L87.39 85.305V202.545V202.555V202.565C87.39 202.735 87.44 202.895 87.46 203.055C87.49 203.265 87.49 203.485 87.55 203.695V203.705C87.6 203.875 87.69 204.035 87.76 204.195C87.84 204.375 87.89 204.575 87.99 204.745C87.99 204.745 87.99 204.755 88 204.755C88.09 204.905 88.22 205.035 88.33 205.175C88.45 205.335 88.55 205.495 88.69 205.635L88.7 205.645C88.82 205.765 88.98 205.855 89.12 205.965C89.28 206.085 89.42 206.225 89.59 206.325C89.6 206.325 89.6 206.325 89.61 206.335C89.62 206.335 89.62 206.345 89.63 206.345L139.87 234.775V285.065L43.67 229.705V60.135ZM244.75 229.705L148.58 285.075V234.775L219.8 194.115L244.75 179.875V229.705ZM297.2 139.625L253.49 164.795V114.995L278.85 100.395L297.21 89.825V139.625H297.2Z" />
                    </svg>
                </a>
                <div class="flex items-center md:order-2">
                    <!-- Bag -->
                    <button type="button" data-dropdown-toggle="bag-dropdown"
                        class="p-2 mr-1 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 ">
                        <span class="sr-only">View Bag shop</span>
                        <!-- Bell icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>

                    </button>
                    <!-- Dropdown menu -->
                    <div class="hidden shadow-lg overflow-hidden z-40 my-4 w-80 text-base list-none bg-white rounded divide-y divide-gray-100 "
                        id="bag-dropdown">
                        <div
                            class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 ">
                            Bag Shop
                        </div>
                        <div>
                            <a href="#" class="flex py-3 px-4 border-b hover:bg-gray-100 ">
                                <div class="flex w-20 ">
                                    <img class="h-11 w-11 object-cover rounded"
                                        src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80"
                                        alt="">
                                </div>
                                <div class="w-full">
                                    <div class="text-gray-500 font-normal text-md">
                                        <span class="font-semibold text-gray-900">
                                            Mac Book Pro
                                        </span>
                                    </div>
                                    <div class="text-sm font-medium text-primary-700 ">
                                        <span>Qte</span>
                                        <span> : </span>
                                        <span>12</span>
                                    </div>
                                </div>
                                <div class="pl-3">
                                    <span class="text-gray-600">20$</span>
                                </div>
                            </a>
                            <a href="#" class="flex py-3 px-4 border-b hover:bg-gray-100 ">
                                <div class="flex w-20 ">
                                    <img class="h-11 w-11 object-cover rounded"
                                        src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80"
                                        alt="">
                                </div>
                                <div class="w-full">
                                    <div class="text-gray-500 font-normal text-md ">
                                        <span class="font-semibold text-gray-900 ">
                                            Mac Book Pro
                                        </span>
                                    </div>
                                    <div class="text-sm font-medium text-primary-700 ">
                                        <span>Qte</span>
                                        <span> : </span>
                                        <span>12</span>
                                    </div>
                                </div>
                                <div class="pl-3">
                                    <span class="text-gray-600">20$</span>
                                </div>
                            </a>
                            <a href="#" class="flex py-3 px-4 border-b hover:bg-gray-100 ">
                                <div class="flex w-20 ">
                                    <img class="h-11 w-11 object-cover rounded"
                                        src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80"
                                        alt="">
                                </div>
                                <div class="w-full">
                                    <div class="text-gray-500 font-normal text-md ">
                                        <span class="font-semibold text-gray-900 ">
                                            Mac Book Pro
                                        </span>
                                    </div>
                                    <div class="text-sm font-medium text-primary-700 ">
                                        <span>Qte</span>
                                        <span> : </span>
                                        <span>12</span>
                                    </div>
                                </div>
                                <div class="pl-3">
                                    <span class="text-gray-600">20$</span>
                                </div>
                            </a>
                        </div>
                        <a href="#"
                            class="flex m-2 items-center justify-center mt-2 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                            <span>Chechout</span>
                            <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>

                    @guest
                        @if (Route::has('login'))
                            <a class="p-2 mr-1 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 "
                                href="{{ route('login') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                            </a>
                        @endif
                    @else
                        <!-- Profil -->
                        <div class="flex sm:items-center">
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
                                    <x-dropdown-link :href="route('home')">
                                        {{ __('Home') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('dashboard.index')">
                                        {{ __('Dashboard') }}
                                    </x-dropdown-link>

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
                    @endguest

                    <button data-collapse-toggle="mobile-menu-2" type="button"
                        class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="mobile-menu-2" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
                    id="mobile-menu-2">
                    <ul
                        class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white ">
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 "
                                aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">About</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Services</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main>
            <div class="relative swiper-container w-full h-full bg-gray-700 overflow-x-hidden">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" data-delay="20000">
                        <img src="https://flowbite.com/docs/images/carousel/carousel-1.svg"
                            class="w-full h-80 object-cover" alt="...">
                    </div>
                    <div class="swiper-slide" data-delay="20000">
                        <img src="https://flowbite.com/docs/images/carousel/carousel-2.svg"
                            class="w-full h-80 object-cover" alt="...">
                    </div>
                    <div class="swiper-slide" data-delay="20000">
                        <img src="https://flowbite.com/docs/images/carousel/carousel-3.svg"
                            class="w-full h-80 object-cover" alt="...">
                    </div>
                </div>
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
            </div>

            <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

            <script>
                var swiper = new Swiper('.swiper-container', {
                    loop: true,
                    autoplay: {
                        delay: 2000,
                        disableOnInteraction: false,
                    },
                    speed: 2000,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    on: {
                        slideVisible: function() {
                            this.slides[this.activeIndex].classList.remove('swiper-slide-hidden');
                        }
                    }
                });
            </script>

            <style>
                .swiper-slide {
                    transition-duration: 2s;
                    transition-timing-function: ease;
                }
            </style>


            <div class="container mx-auto px-6 mt-2">
                <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6">
                    <div class="p-4 grayscale transition duration-200 hover:grayscale-0">
                        <img src="/clients/microsoft.svg" class="w-full h-8 object-contain" loading="lazy"
                            alt="client logo" />
                    </div>
                    <div class="p-4 grayscale transition duration-200 hover:grayscale-0">
                        <img src="/clients/airbnb.svg" class="w-full h-8 object-contain" loading="lazy"
                            alt="client logo" />
                    </div>
                    <div class="p-4 flex grayscale transition duration-200 hover:grayscale-0">
                        <img src="/clients/google.svg" class="w-full h-8 object-contain" loading="lazy"
                            alt="client logo" />
                    </div>
                    <div class="p-4 grayscale transition duration-200 hover:grayscale-0">
                        <img src="/clients/ge.svg" class="w-full h-8 object-contain" loading="lazy"
                            alt="client logo" />
                    </div>
                    <div class="p-4 flex grayscale transition duration-200 hover:grayscale-0">
                        <img src="/clients/netflix.svg" class="w-full h-8 object-contain" loading="lazy"
                            alt="client logo" />
                    </div>
                    <div class="p-4 grayscale transition duration-200 hover:grayscale-0">
                        <img src="/clients/google-cloud.svg" class="w-full h-8 object-contain" loading="lazy"
                            alt="client logo" />
                    </div>
                </div>
            </div>

            <div class="bg-white">
                <main class="my-8">
                    <div class="container mx-auto px-6">
                        <h3 class="text-gray-600 text-2xl font-medium mb-3">Category</h3>
                        <div class="h-64 hover:shadow-xl rounded-md overflow-hidden bg-cover bg-center"
                            style="background-image: url('https://images.unsplash.com/photo-1577655197620-704858b270ac?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1280&q=144')">
                            <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                                <div class="px-10 max-w-xl">
                                    <h2 class="text-2xl text-white font-semibold">
                                        Sport Shoes
                                    </h2>
                                    <p class="mt-2 text-gray-400">Lorem ipsum dolor, sit amet consectetur adipisicing
                                        elit.
                                        Tempore
                                        facere provident molestias ipsam sint voluptatum pariatur.</p>
                                    <button
                                        class="flex items-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                        <span>Shop Now</span>
                                        <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="md:flex mt-8 md:-mx-4">
                            <div class="w-full hover:shadow-xl h-64 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:w-1/2"
                                style="background-image: url('https://images.unsplash.com/photo-1547949003-9792a18a2601?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80')">
                                <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                                    <div class="px-10 max-w-xl">
                                        <h2 class="text-2xl text-white font-semibold">Back Pack</h2>
                                        <p class="mt-2 text-gray-400">Lorem ipsum dolor, sit amet consectetur
                                            adipisicing
                                            elit.
                                            Tempore facere provident molestias ipsam sint voluptatum pariatur.</p>
                                        <button
                                            class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                                            <span>Shop Now</span>
                                            <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full hover:shadow-xl h-64 mt-8 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:mt-0 md:w-1/2"
                                style="background-image: url('https://images.unsplash.com/photo-1486401899868-0e435ed85128?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80')">
                                <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                                    <div class="px-10 max-w-xl">
                                        <h2 class="text-2xl text-white font-semibold">Games</h2>
                                        <p class="mt-2 text-gray-400">Lorem ipsum dolor, sit amet consectetur
                                            adipisicing
                                            elit.
                                            Tempore facere provident molestias ipsam sint voluptatum pariatur.</p>
                                        <button
                                            class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                                            <span>Shop Now</span>
                                            <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-16">
                            <h3 class="text-gray-600 text-2xl font-medium">Fashions</h3>
                            <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                                <div
                                    class="w-full hover:shadow-xl shadow-md  bg-white border border-gray-200 rounded-lg  dark:bg-gray-800 dark:border-gray-700">
                                    <a href="#">
                                        <img class="rounded-t-lg"
                                            src="https://images.unsplash.com/photo-1544441893-675973e31985?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80"
                                            alt="product image" />
                                    </a>

                                    <div class="px-3 py-2">
                                        <div class="font-bold text-xl">Product Name</div>
                                        <p class="text-gray-700 text-md">
                                            Category
                                        </p>
                                        <div class="flex items-center justify-between">
                                            <span class="text-xl font-bold text-gray-900 dark:text-white">$599</span>
                                            <a href="#"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                                                to cart</a>
                                        </div>
                                    </div>

                                </div>
                                <div
                                    class="w-full hover:shadow-xl shadow-md  bg-white border border-gray-200 rounded-lg  dark:bg-gray-800 dark:border-gray-700">
                                    <a href="#">
                                        <img class="rounded-t-lg"
                                            src="https://images.unsplash.com/photo-1544441893-675973e31985?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80"
                                            alt="product image" />
                                    </a>

                                    <div class="px-3 py-2">
                                        <div class="font-bold text-xl">Product Name</div>
                                        <p class="text-gray-700 text-md">
                                            Category
                                        </p>
                                        <div class="flex items-center justify-between">
                                            <span class="text-xl font-bold text-gray-900 dark:text-white">$599</span>
                                            <a href="#"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                                                to cart</a>
                                        </div>
                                    </div>

                                </div>
                                <div
                                    class="w-full hover:shadow-xl shadow-md  bg-white border border-gray-200 rounded-lg  dark:bg-gray-800 dark:border-gray-700">
                                    <a href="#">
                                        <img class="rounded-t-lg"
                                            src="https://images.unsplash.com/photo-1544441893-675973e31985?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80"
                                            alt="product image" />
                                    </a>

                                    <div class="px-3 py-2">
                                        <div class="font-bold text-xl">Product Name</div>
                                        <p class="text-gray-700 text-md">
                                            Category
                                        </p>
                                        <div class="flex items-center justify-between">
                                            <span class="text-xl font-bold text-gray-900 dark:text-white">$599</span>
                                            <a href="#"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                                                to cart</a>
                                        </div>
                                    </div>

                                </div>
                                <div
                                    class="w-full hover:shadow-xl shadow-md  bg-white border border-gray-200 rounded-lg  dark:bg-gray-800 dark:border-gray-700">
                                    <a href="#">
                                        <img class="rounded-t-lg"
                                            src="https://images.unsplash.com/photo-1544441893-675973e31985?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80"
                                            alt="product image" />
                                    </a>

                                    <div class="px-3 py-2">
                                        <div class="font-bold text-xl">Product Name</div>
                                        <p class="text-gray-700 text-md">
                                            Category
                                        </p>
                                        <div class="flex items-center justify-between">
                                            <span class="text-xl font-bold text-gray-900 dark:text-white">$599</span>
                                            <a href="#"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                                                to cart</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="w-full bg-white dark:bg-gray-800 dark:border-gray-700">

                            <div class="border-gray-200 dark:border-gray-600">
                                <div class="border-y p-4 bg-white md:p-8 dark:bg-gray-800">
                                    <dl
                                        class="grid max-w-screen-xl grid-cols-2 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-3 xl:grid-cols-6 dark:text-white sm:p-8">
                                        <div class="flex flex-col items-center justify-center">
                                            <dt class="mb-2 text-3xl font-extrabold">73M+</dt>
                                            <dd class="text-gray-500 dark:text-gray-400">Developers</dd>
                                        </div>
                                        <div class="flex flex-col items-center justify-center">
                                            <dt class="mb-2 text-3xl font-extrabold">100M+</dt>
                                            <dd class="text-gray-500 dark:text-gray-400">Public repositories</dd>
                                        </div>
                                        <div class="flex flex-col items-center justify-center">
                                            <dt class="mb-2 text-3xl font-extrabold">1000s</dt>
                                            <dd class="text-gray-500 dark:text-gray-400">Open source projects</dd>
                                        </div>
                                        <div class="flex flex-col items-center justify-center">
                                            <dt class="mb-2 text-3xl font-extrabold">1B+</dt>
                                            <dd class="text-gray-500 dark:text-gray-400">Contributors</dd>
                                        </div>
                                        <div class="flex flex-col items-center justify-center">
                                            <dt class="mb-2 text-3xl font-extrabold">90+</dt>
                                            <dd class="text-gray-500 dark:text-gray-400">Top Forbes companies</dd>
                                        </div>
                                        <div class="flex flex-col items-center justify-center">
                                            <dt class="mb-2 text-3xl font-extrabold">4M+</dt>
                                            <dd class="text-gray-500 dark:text-gray-400">Organizations</dd>
                                        </div>
                                    </dl>
                                </div>
                                <div class="border-b p-5 bg-white rounded-lg md:p-8 bg-gray-300 dark:bg-gray-800">
                                    <h2
                                        class="mb-4 text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white">
                                        We invest
                                        in the world’s potential</h2>
                                    <ul role="list" class="space-y-4 text-gray-500 dark:text-gray-400">
                                        <li class="flex space-x-2">
                                            <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="leading-tight">Dynamic reports and dashboards</span>
                                        </li>
                                        <li class="flex space-x-2">
                                            <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="leading-tight">Templates for everyone</span>
                                        </li>
                                        <li class="flex space-x-2">
                                            <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="leading-tight">Development workflow</span>
                                        </li>
                                        <li class="flex space-x-2">
                                            <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="leading-tight">Limitless business automation</span>
                                        </li>
                                    </ul>
                                </div>

                                <section class="my-25 text-gray-800 text-center">

                                    <div class="px-6 py-12 md:px-12">
                                        <div class=" mx-auto xl:px-32">
                                            <div class="grid lg:grid-cols-2 flex items-center">
                                                <div class="z-20 md:mt-12 lg:mt-0 mb-12 lg:mb-0">
                                                    <div class="block rounded-lg shadow-lg px-6 py-12 md:px-12 lg:-mr-14"
                                                        style="background: hsla(0, 0%, 100%, 0.55); backdrop-filter: blur(30px)">
                                                        <h2 class="text-3xl font-bold mb-12">Contact us</h2>
                                                        <form>
                                                            <div class="form-group mb-6">
                                                                <input type="text"
                                                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                                    id="exampleInput7" placeholder="Name" />
                                                            </div>
                                                            <div class="form-group mb-6">
                                                                <input type="email"
                                                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                                    id="exampleInput8" placeholder="Email address" />
                                                            </div>
                                                            <div class="form-group mb-6">
                                                                <textarea
                                                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                                    id="exampleFormControlTextarea13" rows="3" placeholder="Message"></textarea>
                                                            </div>
                                                            <div class="form-group form-check text-center mb-6">
                                                                <input type="checkbox"
                                                                    class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain mr-2 cursor-pointer"
                                                                    id="exampleCheck87" checked />
                                                                <label
                                                                    class="form-check-label inline-block text-gray-800"
                                                                    for="exampleCheck87">Send me a copy of this
                                                                    message</label>
                                                            </div>
                                                            <button type="submit"
                                                                class="w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                                                Send
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="z-0 md:mb-12 lg:mb-0 ">
                                                    <div class="relative shadow-lg rounded-lg">
                                                        <iframe
                                                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31153.35325925528!2d-9.6081057!3d30.3916449!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdb3b7c0bb8a4057%3A0x30eea45209efa340!2sDunes%20Golf%20Club%20Red%20Course%20Tamarisk!5e1!3m2!1sfr!2sma!4v1685298094869!5m2!1sfr!2sma"
                                                            class="left-0 top-0 rounded-lg w-full" height="600"
                                                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>



                                <div class=" border-t p-5 bg-white rounded-lg md:p-8 dark:bg-gray-800">
                                    <div id="accordion-flush" data-accordion="collapse"
                                        data-active-classes="bg-white dark:bg-gray-800 text-gray-900 dark:text-white"
                                        data-inactive-classes="text-gray-500 dark:text-gray-400">
                                        <h2 id="accordion-flush-heading-1">
                                            <button type="button"
                                                class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400"
                                                data-accordion-target="#accordion-flush-body-1" aria-expanded="true"
                                                aria-controls="accordion-flush-body-1">
                                                <span>What is Flowbite?</span>
                                                <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </h2>
                                        <div id="accordion-flush-body-1" class="hidden"
                                            aria-labelledby="accordion-flush-heading-1">
                                            <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                                                <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is an
                                                    open-source
                                                    library
                                                    of interactive components built on top of Tailwind CSS including
                                                    buttons,
                                                    dropdowns, modals, navbars, and more.</p>
                                                <p class="text-gray-500 dark:text-gray-400">Check out this guide to
                                                    learn
                                                    how to <a href="/docs/getting-started/introduction/"
                                                        class="text-blue-600 dark:text-blue-500 hover:underline">get
                                                        started</a>
                                                    and start developing websites even faster with components on top of
                                                    Tailwind
                                                    CSS.</p>
                                            </div>
                                        </div>
                                        <h2 id="accordion-flush-heading-2">
                                            <button type="button"
                                                class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400"
                                                data-accordion-target="#accordion-flush-body-2" aria-expanded="false"
                                                aria-controls="accordion-flush-body-2">
                                                <span>Is there a Figma file available?</span>
                                                <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </h2>
                                        <div id="accordion-flush-body-2" class="hidden"
                                            aria-labelledby="accordion-flush-heading-2">
                                            <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                                                <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is first
                                                    conceptualized
                                                    and designed using the Figma software so everything you see in the
                                                    library has a
                                                    design equivalent in our Figma file.</p>
                                                <p class="text-gray-500 dark:text-gray-400">Check out the <a
                                                        href="https://flowbite.com/figma/"
                                                        class="text-blue-600 dark:text-blue-500 hover:underline">Figma
                                                        design
                                                        system</a> based on the utility classes from Tailwind CSS and
                                                    components
                                                    from Flowbite.</p>
                                            </div>
                                        </div>
                                        <h2 id="accordion-flush-heading-3">
                                            <button type="button"
                                                class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400"
                                                data-accordion-target="#accordion-flush-body-3" aria-expanded="false"
                                                aria-controls="accordion-flush-body-3">
                                                <span>What are the differences between Flowbite and Tailwind UI?</span>
                                                <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </h2>
                                        <div id="accordion-flush-body-3" class="hidden"
                                            aria-labelledby="accordion-flush-heading-3">
                                            <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                                                <p class="mb-2 text-gray-500 dark:text-gray-400">The main difference is
                                                    that the
                                                    core components from Flowbite are open source under the MIT license,
                                                    whereas
                                                    Tailwind UI is a paid product. Another difference is that Flowbite
                                                    relies on
                                                    smaller and standalone components, whereas Tailwind UI offers
                                                    sections
                                                    of pages.
                                                </p>
                                                <p class="mb-2 text-gray-500 dark:text-gray-400">However, we actually
                                                    recommend
                                                    using both Flowbite, Flowbite Pro, and even Tailwind UI as there is
                                                    no
                                                    technical
                                                    reason stopping you from using the best of two worlds.</p>
                                                <p class="mb-2 text-gray-500 dark:text-gray-400">Learn more about these
                                                    technologies:</p>
                                                <ul class="pl-5 text-gray-500 list-disc dark:text-gray-400">
                                                    <li><a href="https://flowbite.com/pro/"
                                                            class="text-blue-600 dark:text-blue-500 hover:underline">Flowbite
                                                            Pro</a></li>
                                                    <li><a href="https://tailwindui.com/" rel="nofollow"
                                                            class="text-blue-600 dark:text-blue-500 hover:underline">Tailwind
                                                            UI</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </main>

            </div>
        </main>
    </div>



    <script src="https://cdn.tailwindcss.com/2.2.15/tailwind.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>


</body>

</html>
