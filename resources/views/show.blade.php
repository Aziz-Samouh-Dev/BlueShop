@extends('layouts.navbarHome')

@section('content')
    <div class="py-6">
        <!-- Breadcrumbs -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center space-x-2 text-gray-400 text-sm">
                <a href="/product" class="hover:underline hover:text-gray-600">Products</a>
                <span>
                    <svg class="h-5 w-5 leading-none text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </span>
                <a href="#" class="hover:underline hover:text-gray-600"> {{ $product->category->name }} </a>
                <span>
                    <svg class="h-5 w-5 leading-none text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </span>
                <span>{{ $product->name }}</span>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
            <div class="flex flex-col md:flex-row -mx-4">
                <div class="md:flex-1 px-4">
                    <div class="w-full flex items-center justify-center">
                        <div class="form-group flex items-center justify-center  p-3">
                            <div class="shrink-0 px-3">
                                <div class="grid gap-2 grid-cols-1">
                                    <div class="product-image-main">
                                        <img id="main-image" class=" object-cover rounded-lg w-full"
                                            style=" height: 400px; object-fit: cover;"
                                            src="{{ asset('images/' . $product->images[0]->filename) }}" alt=""
                                            id="main-image">
                                    </div>
                                    <div class="grid gap-2 grid-cols-6 justify-between">
                                        @foreach ($product->images->take(6) as $image)
                                            <img src="{{ asset('images/' . $image->filename) }}" alt=""
                                                id="image-list" class="w-20 h-20 object-cover rounded-lg cursor-pointer">
                                        @endforeach
                                    </div>
                                    <script>
                                        const sliderMainImage = document.getElementById("main-image");
                                        const sliderImageList = document.querySelectorAll("#image-list");

                                        sliderImageList.forEach((image, index) => {
                                            image.onclick = function() {
                                                sliderMainImage.src = image.src;
                                                console.log(sliderMainImage.src);
                                            };
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:flex-1 px-4">
                    <h2 class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl">
                        {{ $product->name }} .
                    </h2>
                    <p class="text-gray-500 text-sm">
                        <a href="#" class="text-indigo-600 hover:underline">
                            {{ $product->category->name }}
                        </a>
                    </p>

                    <div class="flex items-center space-x-4 my-4">
                        <div>
                            <div class="rounded-lg bg-gray-100 py-2 px-3">
                                <span class="text-indigo-400 mr-1 mt-1">$</span>
                                <span class="font-bold text-indigo-600 text-3xl">{{ $product->price }}</span>
                            </div>
                        </div>
                    </div>

                    <p class="text-gray-500 my-4">
                        {{ $product->description }} .
                    </p>

                    <a href="{{ route('checkout', ['product' => $product->id]) }}">
                        <button type="button"
                            class="flex items-center h-14 px-6 py-2 font-semibold rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white">
                          
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                            </svg>

                            <span class="px-4">Checkout</span>
                        </button>
                    </a>

                </div>
            </div>
        </div>
    </div>
@endsection
