@extends('dashboard')

@section('title', 'Edit Product')

@section('content')
    <main class="h-full overflow-y-auto p-4">
        <div>
            <h2 class="my-6 text-2xl font-semibold text-gray-700 leading-tight">
                {{ __('Edit Product') }}
            </h2>
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
                class="py-3 px-5 overflow-hidden bg-white shadow-lg rounded-lg w-full">
                @csrf
                @method('PUT')


                <div class="grid gap-6 my-6 md:grid-cols-1">

                    <div>
                        <label for="photos" class="block mb-2 text-sm font-medium text-gray-900">
                            Photos (up to 4 images)
                        </label>
                        <div class="border p-4 grid justify-center items-center">
                            <div class=" grid grid-cols-1 gap-2 justify-center items-center">
                                <input type="file" id="photos" name="photos[]" multiple
                                    class="flex  text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-smfile:font-semibold file:bg-violet-50  file:text-violet-700 hover:file:bg-violet-100" />
                                <div id="image-preview" class="flex gap-2"></div>
                            </div>
                        </div>

                        <script>
                            const fileInput = document.getElementById("photos");
                            const imagePreview = document.getElementById("image-preview");

                            fileInput.addEventListener("change", function() {
                                imagePreview.innerHTML = ""; // Clear previous previews

                                const files = Array.from(fileInput.files).slice(0, 4); // Get up to 4 selected files

                                files.forEach(function(file) {
                                    const reader = new FileReader();

                                    reader.onload = function(e) {
                                        const img = document.createElement("img");
                                        img.src = e.target.result;
                                        img.classList.add("w-32", "h-32", "object-cover", "rounded-lg", "mr-2");

                                        imagePreview.appendChild(img);
                                    };

                                    reader.readAsDataURL(file);
                                });
                            });
                        </script>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">
                                Name
                            </label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                id="name" name="name" required value="{{ $product->name }}">
                        </div>
                        <div>
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900">
                                Category
                            </label>
                            <input
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                type="text" id="category" name="category" required value="{{ $product->category }}">
                        </div>
                        <div>
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900">
                                Price
                            </label>
                            <input
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                type="number" id="price" name="price" step="0.01" required
                                value="{{ $product->price }}">
                        </div>
                        <div>
                            <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900">
                                Quantity
                            </label>
                            <input
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                type="number" id="quantity" name="quantity" required value="{{ $product->quantity }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                        <textarea id="description" name="description" required
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="">{{ $product->description }}</textarea>

                    </div>

                </div>
                <div class="flex justify-center">
                    <button type="submit"
                        class="relative flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-200">
                        <span
                            class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white rounded-md group-hover:bg-opacity-0">
                            Update
                        </span>
                    </button>
                </div>
            </form>
        </div>
        <div>
            <span class="my-3 p-2">
                <hr>
            </span>
        </div>
    </main>
@endsection
