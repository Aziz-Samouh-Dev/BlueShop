@extends('layouts.navbarHome')

@section('content')
    <section class="h-screen bg-gray-100 py-12 sm:py-16 lg:py-20">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-center">
                <h1 class="text-2xl font-semibold text-gray-900">Your Order</h1>
            </div>

            <div class="mx-auto mt-8 max-w-2xl md:mt-12">
                <div class="bg-white shadow">
                    <div class="px-4 py-6 sm:px-8 sm:py-10">

                        <form action="{{ route('order.store') }}" method="post">
                            @csrf
                            <div class="flow-root">
                                <ul class="-my-8">
                                    <li
                                        class="flex flex-col space-y-3 py-6 text-left sm:flex-row sm:space-x-5 sm:space-y-0">
                                        <div class="shrink-0">
                                            @foreach ($product->images->take(1) as $image)
                                                <img src="{{ asset('images/' . $image->filename) }}" alt=""
                                                    id="" class="h-24 w-24 max-w-full rounded-lg object-cover">
                                            @endforeach
                                        </div>
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <div class="relative flex flex-1 flex-col justify-between">
                                            <div class="sm:col-gap-5 sm:grid sm:grid-cols-2">
                                                <div class="pr-8 sm:pr-5">
                                                    <p class="text-base font-semibold text-gray-900">{{ $product->name }}
                                                    </p>
                                                    <p class="mx-0 mt-1 mb-0 text-sm text-gray-400">
                                                        <span class="text-xs font-normal text-gray-400">$</span>
                                                        {{ $product->price }}
                                                    </p>
                                                </div>
                                                <div
                                                    class="mt-4 flex items-end justify-between sm:mt-0 sm:items-start sm:justify-end">
                                                    <div class="sm:order-1 flex items-center justify-center">
                                                        <div class="mx-auto flex h-8 items-stretch text-gray-600">
                                                            <button onclick="decrementQuantity()" type="button"
                                                                class="flex items-center justify-center rounded-l-md bg-gray-200 px-4 transition hover:bg-black hover:text-white">-</button>
                                                            <input type="number" id="quantity" name="quantity"
                                                                class="flex w-16 items-center justify-center bg-gray-100 text-xs uppercase transition"
                                                                value="1" min="1">
                                                            <button onclick="incrementQuantity()" type="button"
                                                                class="flex items-center justify-center rounded-r-md bg-gray-200 px-4 transition hover:bg-black hover:text-white">+</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="mt-6 border-t border-b py-2">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm text-gray-400">Subtotal</p>
                                    <p id="subtotal" class="text-lg font-semibold text-gray-900">$0.00</p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <p class="text-sm text-gray-400">Shipping</p>
                                    <p id="shipping" class="text-lg font-semibold text-gray-900">$<?php $shipping = 10;
                                    echo $shipping; ?></p>
                                </div>
                            </div>
                            <div class="mt-6 flex items-center justify-between">
                                <p class="text-sm font-medium text-gray-900">Total</p>
                                <p id="total" class="text-2xl font-semibold text-gray-900">
                                    <span class="text-xs font-normal text-gray-400">$0.00</span>
                                </p>
                            </div>

                            <script>
                                function incrementQuantity() {
                                    var quantityElement = document.getElementById("quantity");
                                    var quantity = parseInt(quantityElement.value);
                                    var maxQuantity = parseInt("{{ $product->quantity }}");

                                    if (quantity < maxQuantity) {
                                        quantity++;
                                        quantityElement.value = quantity.toString();
                                        calculateTotal();
                                    } else {
                                        alert("Cannot add more than the available quantity.");
                                    }
                                }

                                function decrementQuantity() {
                                    var quantityElement = document.getElementById("quantity");
                                    var quantity = parseInt(quantityElement.value);

                                    if (quantity > 1) {
                                        quantity--;
                                        quantityElement.value = quantity.toString();
                                        calculateTotal();
                                    }
                                }

                                function calculateTotal() {
                                    var quantityElement = document.getElementById("quantity");
                                    var quantity = parseInt(quantityElement.value);
                                    var price = parseFloat("{{ $product->price }}");
                                    var shipping = parseFloat("<?php $shipping = 10;
                                    echo $shipping; ?>");

                                    var subtotal = price * quantity;
                                    var total = subtotal + shipping;

                                    var subtotalElement = document.getElementById("subtotal");
                                    var totalElement = document.getElementById("total");

                                    subtotalElement.innerText = "$" + subtotal.toFixed(2);
                                    totalElement.innerHTML = "$" + total.toFixed(2);
                                }

                                calculateTotal();
                            </script>

                            @guest
                                @if (Route::has('login'))
                                    <a href="{{ route('login') }}">
                                        <button type="button"
                                            class="group mt-6 inline-flex w-full items-center justify-center rounded-md bg-gray-900 px-6 py-4 text-lg font-semibold text-white transition-all duration-200 ease-in-out focus:shadow hover:bg-gray-800">
                                            Checkout
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="group-hover:ml-8 ml-4 h-6 w-6 transition-all" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                            </svg>
                                        </button>
                                    </a>
                                @endif
                            @else
                                <button type="submit"
                                    class="group mt-6 inline-flex w-full items-center justify-center rounded-md bg-gray-900 px-6 py-4 text-lg font-semibold text-white transition-all duration-200 ease-in-out focus:shadow hover:bg-gray-800">
                                    Checkout
                                    <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:ml-8 ml-4 h-6 w-6 transition-all"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </button>
                            @endguest
                        </form>

                    </div>
                </div>
            </div>
    </section>
@endsection
