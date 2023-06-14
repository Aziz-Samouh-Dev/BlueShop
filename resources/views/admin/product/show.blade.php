@extends('dashboard')

@section('title', 'Product Details')

@section('content')




    <main class="h-full overflow-y-auto p-4">
        <div>
            <h2 class="my-6 text-2xl font-semibold text-gray-700 leading-tight">
                {{ __('Product Details') }}
            </h2>
            <div class="py-3 px-5 overflow-hidden bg-white shadow-lg rounded-lg w-full">
                <div class="grid gap-6 my-6 md:grid-cols-1">

                    <div class="flex w-full">
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
                                                    id="image-list"
                                                    class="w-20 h-20 object-cover rounded-lg cursor-pointer">
                                            @endforeach
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
                                    {{ $product->name }}
                                </p>
                            </div>
                            <div>
                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">
                                    Category
                                </label>
                                <p class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5">
                                    {{ $product->category->name }}
                                </p>
                            </div>
                            <div>
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900">
                                    Price
                                </label>
                                <p class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5">
                                    {{ $product->price }}
                                </p>
                            </div>
                            <div>
                                <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900">
                                    Quantity
                                </label>
                                <p class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5">
                                    {{ $product->quantity }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                        <p class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5">
                            {{ $product->description }}
                        </p>
                    </div>
                </div>



                <div class="flex justify-center">

                    <a href="{{ route('products.edit', $product->id) }}">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                            <span>
                                Edit
                            </span>
                        </button>
                    </a>
                    <a href="#">
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="py-2 px-4 bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75"
                                onclick="return confirm('Are you sure you want to delete this product?')">
                                <span>

                                    Delete
                                </span>
                            </button>
                        </form>

                    </a>
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
