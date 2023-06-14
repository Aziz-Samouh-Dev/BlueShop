@extends('layouts.navbarHome')

@section('content')
    <div id="app">
        <div class="bg-white ">
            <div>
                <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="bg-white grid justify-center py-5">
                        <div class="w-full items-center justify-center mx-auto px-4 py-2 grid grid-cols-1">
                            <h1 class="text-4xl font-bold tracking-tight text-gray-900 text-center">Products</h1>
                        </div>
                        <div class="w-full items-center justify-center mx-auto px-4 py-2 grid grid-cols-1">
                            <form action="{{ route('pro') }}" method="GET">
                                <div class="flex w-80">
                                    <div class="relative w-full">
                                        <input type="text" name="query" placeholder="Search"
                                            class="w-full py-2 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                            value="{{ request('query') }}">
                                        <button
                                            class="absolute right-2 top-2 text-gray-400 hover:text-gray-600 focus:outline-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <section aria-labelledby="products-heading" class="pb-24 pt-6">
                        <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
                            @foreach ($products as $item)
                                <div class="w-full hover:shadow-xl shadow-md bg-white border border-gray-200 rounded-lg">
                                    <a href="{{ route('product.show', $item->id) }}" style="height: 200px;">
                                        <img class="rounded-t-lg w-full " style="height: 200px; object-fit: cover;"
                                            src="{{ asset('images/' . $item->images[0]->filename) }}" alt="product image" />
                                    </a>
                                    <div class="px-3 py-2">
                                        <div class="font-bold text-xl">
                                            {{ strlen($item->name) > 38 ? substr($item->name, 0, 38) . '...' : $item->name }}
                                        </div>

                                        <p class="text-gray-700 text-md">{{ $item->category->name }}</p>
                                        <div class="flex items-center justify-between">
                                            <span class="text-xl font-bold text-gray-900">${{ $item->price }}</span>
                                            <a href="{{ url('product/' . $item->id ) }}"
                                                class="add-to-cart text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </div>

    <button id="to-top-button" onclick="goToTop()" title="Go To Top"
        class="hidden fixed z-50 bottom-10 right-10 p-4 border-0 w-14 h-14 rounded-full shadow-md bg-purple-600 hover:bg-purple-700 text-white text-lg font-semibold transition-colors duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
            <path d="M12 4l8 8h-6v8h-4v-8H4l8-8z" />
        </svg>
        <span class="sr-only">Go to top</span>
    </button>

    <script>
        // Get the 'to top' button element by ID
        var toTopButton = document.getElementById("to-top-button");

        // Check if the button exists
        if (toTopButton) {

            // On scroll event, toggle button visibility based on scroll position
            window.onscroll = function() {
                if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                    toTopButton.classList.remove("hidden");
                } else {
                    toTopButton.classList.add("hidden");
                }
            };

            // Function to scroll to the top of the page smoothly
            window.goToTop = function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            };
        }
    </script>
@endsection
