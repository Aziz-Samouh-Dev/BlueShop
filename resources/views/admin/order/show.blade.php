@extends('dashboard')

@section('title', 'Order Details')

@section('content')




    <main class="h-full overflow-y-auto p-4">
        <div>
            <h2 class="my-6 text-2xl font-semibold text-gray-700 leading-tight">
                {{ __('Order Details') }}
            </h2>
            <div class="py-3 px-5 overflow-hidden bg-white shadow-lg rounded-lg w-full">
                <div class="grid gap-6 my-6 md:grid-cols-1">

                    <div class="flex w-full">
                        <div class="w-full flex items-center justify-center">
                            <div class="form-group flex items-center justify-center  p-3">
                                <div class="shrink-0 px-3">
                                    <div class="grid gap-2 grid-cols-1">
                                        <div class="product-image-main">
                                            <img id="main-image" class=" object-cover rounded-full "
                                                style=" height: 400px; width: 400px; object-fit: cover;"
                                                src="{{ asset('images/' . $order->product->images[0]->filename) }}"
                                                alt="" id="main-image">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full grid gap-6">
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">
                                    Name
                                </label>
                                <p class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5">
                                    {{ $order->product->name }}
                                </p>
                            </div>
                            <div>
                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">
                                    Category
                                </label>
                                <p class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5">
                                    {{ $order->product->category->name }}
                                </p>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900">
                                        Price
                                    </label>
                                    <p class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5">
                                        {{ $order->total_price }}
                                    </p>
                                </div>
                                <div>
                                    <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900">
                                        Quantity
                                    </label>
                                    <p class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5">
                                        {{ $order->quantity }}
                                    </p>
                                </div>
                            </div>
                          
                            <div class="form-group">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                                <p class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5">
                                    {{ $order->product->description }}
                                </p>
                            </div>
                        </div>
                    </div>
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
    </main>
@endsection
