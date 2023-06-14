@extends('dashboard')

@section('title', 'Product Create')

@section('content')

    <main class="h-full overflow-y-auto p-4">
        <div>
            <h2 class="my-6 text-2xl font-semibold text-gray-700 leading-tight">
                {{ __('Create Product') }}
            </h2>
            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data"
                class="py-3 px-5 overflow-hidden bg-white shadow-lg rounded-lg w-full">
                @csrf

                <div class="p-4">
                    @if ($errors->any())
                        <div id="alert-2" class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50" role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ml-3 text-sm font-medium">
                                @error('photos.*')
                                    {{ $message }}<br>
                                @enderror
                                @error('name')
                                    {{ $message }}<br>
                                @enderror
                                @error('price')
                                    {{ $message }}<br>
                                @enderror
                                @error('quantity')
                                    {{ $message }}<br>
                                @enderror
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </div>
                            <button type="button"
                                class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8"
                                data-dismiss-target="#alert-2" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    @endif
                </div>

                <div class="grid gap-6 my-6 md:grid-cols-1">
                    <div>
                        <label for="photos" class="block mb-2 text-sm font-medium text-gray-900">
                            Photos (up to 6 images)
                        </label>
                        <input type="file" id="photos" name="photos[]" multiple
                            class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-smfile:font-semibold file:bg-violet-50  file:text-violet-700 hover:file:bg-violet-100" />

                        <div id="image-preview" class="mt-4 flex gap-2"></div>
                    </div>





                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                                Name
                            </label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                id="name" name="name" value="{{ old('name') }}">
                        </div>
                        <div>
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">
                                Category
                            </label>
                            <select value="{{ old('category') }}" id="category" name="category"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="" hidden hidden>select category ...</option>
                                @foreach ($categorys as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">
                                Price
                            </label>
                            <input
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                type="number" id="price" name="price" step="0.01" value="{{ old('price') }}">
                        </div>
                        <div>
                            <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 ">
                                Quantity
                            </label>
                            <input
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                type="number" id="quantity" name="quantity" value="{{ old('quantity') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Description</label>
                        <textarea id="description" name="description" value="{{ old('description') }}"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                            placeholder=""></textarea>

                    </div>

                </div>
                <div class="flex justify-center">
                    <button type="submit"
                        class="relative flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-200 ">
                        <span
                            class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white rounded-md group-hover:bg-opacity-0">
                            Create
                        </span>
                    </button>
                </div>
            </form>
        </div>
        <div>
            <span class="my-3 p-2">
                <hr>


                <script>
                    const fileInput = document.getElementById("photos");
                    const imagePreview = document.getElementById("image-preview");

                    fileInput.addEventListener("change", function() {
                        imagePreview.innerHTML = ""; // Clear previous previews

                        const files = Array.from(fileInput.files).slice(0, 6); // Get up to 4 selected files

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
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var photoInput = document.getElementById('photo');
                        var selectedImage = document.getElementById('selected-image');

                        photoInput.addEventListener('change', function(event) {
                            var file = event.target.files[0];
                            var reader = new FileReader();

                            reader.onload = function(e) {
                                selectedImage.src = e.target.result;
                            };

                            if (file) {
                                reader.readAsDataURL(file);
                            } else {
                                selectedImage.src = "";
                            }
                        });
                    });
                </script>
            </span>
        </div>
    </main>

@endsection
