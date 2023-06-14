@extends('dashboard')
@section('title', 'Categotys')

@section('content')
    <section class="h-full overflow-y-auto p-4">
        <div class="container mx-auto grid  ">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 leading-tight ">
                {{ __('Categotys') }}
            </h2>


            <div class="w-full overflow-hidden bg-white shadow-lg rounded-lg p-4">
                @if (session('success'))
                    <div id="alert-2" class="flex p-4 mb-4 text-green-800 rounded-lg bg-green-50" role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ml-3 text-sm font-medium">
                            {{ session('success') }}
                        </div>
                        <button type="button"
                            class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8"
                            data-dismiss-target="#alert-2" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                @endif

                <div class="bg-white px-8 py-4 ">
                    <div class="sm:flex items-center justify-between">
                        <label class="relative block">
                            <span class="sr-only">Search</span>
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>
                            </span>
                            <input
                                class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
                                placeholder="Search for categorys ... " type="text" name="search" id="search" />
                        </label>
                        <a href="{{ route('categorys.create') }}">
                            <button
                                class="relative items-center justify-center p-0.5  overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300">
                                <p
                                    class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white rounded-md group-hover:bg-opacity-0">
                                    Add category</p>
                            </button>
                        </a>
                    </div>
                </div>
                <hr class="mx-8 my-4">
                <div class="w-full overflow-x-auto px-6 pb-8 ">
                    <div class="card grid gap-6  md:grid-cols-3 ">
                        @foreach ($categorys as $category)
                            <div id="card{{ $category->id }}"
                                style="background-image:url('{{ asset('images/categories/' . $category->image) }}' );"
                                class="w-full bg-bottom bg-cover max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:shadow-xl">
                                <div class="flex justify-end px-4 pt-4">
                                    <button id="dropdownButton" data-dropdown-toggle="dropdown{{ $category->id }}"
                                        class="inline-block text-gray-50 focus:ring-4 focus:outline-none focus:ring-gray-200  rounded-lg text-sm p-1.5"
                                        type="button">
                                        <span class="sr-only">Open dropdown</span>
                                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                            </path>
                                        </svg>
                                    </button>
                                    <!-- Dropdown menu -->
                                    <div id="dropdown{{ $category->id }}"
                                        class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                                        <ul class="py-2" aria-labelledby="dropdownButton">
                                            <li>
                                                <a href="{{ route('categorys.edit', $category) }}"
                                                    class="grid px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 text-center ">Edit</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="grid px-4 py-2 text-sm text-red-600 hover:bg-gray-100 ">
                                                    <form action="{{ route('categorys.destroy', $category) }}"
                                                        method="POST" class="grid">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class=" "
                                                            onclick="return confirm('Are you sure you want to delete this category?')">
                                                            <span>
                                                                Delete
                                                            </span>
                                                        </button>
                                                    </form>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="flex flex-col items-center p-10">
                                    <div class="block rounded-lg ">
                                        <div class="grid w-full h-full shadow-lg bg-gray-800/50 p-6 rounded-lg ">

                                            <div class="grid  gap-6  ">
                                                <h5 class=" text-2xl font-black leading-tight text-white text-center">
                                                    {{ $category->name }}
                                                </h5>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <span class="my-3 p-2">
            <hr>

            <script>
                const searchInput = document.getElementById('search');
                const cards = document.querySelectorAll('.card > div');
                const noResultsMessage = document.getElementById('no-results');

                searchInput.addEventListener('input', function(event) {
                    const searchTerm = event.target.value.toLowerCase();
                    let hasResults = false;

                    cards.forEach(function(card) {
                        const cardId = card.id.replace('card', '');
                        const category = document.querySelector(`#card${cardId} h5`).textContent.toLowerCase();

                        if (category.includes(searchTerm)) {
                            card.style.display = 'block';
                            hasResults = true;
                        } else {
                            card.style.display = 'none';
                        }
                    });

                });
            </script>

        </span>
    </section>



@endsection



{{-- @extends('dashboard')

@section('title', 'Products')

@section('content')
    <section class="h-full overflow-y-auto p-4">
        <div class="container mx-auto grid  ">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 leading-tight ">
                {{ __('Products') }}
            </h2>
            <div class="w-full overflow-hidden bg-white shadow-lg rounded-lg ">

                <div class="bg-white md:py-4 px-4 md:px-8 xl:px-10 ">
                    <div class="sm:flex items-center justify-between">
                        <label class="relative block">
                            <span class="sr-only">Search</span>
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>
                            </span>
                            <input
                                class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
                                placeholder="Search for Products ... " type="text" name="search"
                                id="search-input" />
                        </label>
                        <a href="{{ route('products.create') }}">
                            <button
                                class="relative items-center justify-center p-0.5  overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300">
                                <p
                                    class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white rounded-md group-hover:bg-opacity-0">
                                    Add Product</p>
                            </button>
                        </a>
                    </div>
                </div>
                <div class="w-full overflow-x-auto p-4">
                    <table class="w-full whitespace-no-wrap bg-white ">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 bg-gray-100 uppercase border-b">
                                <th class="px-4 py-3">Client</th>
                                <th class="px-4 py-3">Quantity</th>
                                <th class="px-4 py-3">Price</th>
                                <th class="px-4 py-3">Date</th>
                                <th class="px-4 py-3 text-center">Status</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y">
                            @if (count($products) > 0)
                                @foreach ($products as $product)
                                    <tr class="text-gray-700">
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                    <img class="object-cover w-full h-full rounded-full"
                                                        src="{{ asset('images/' . $product->images[0]->filename) }}"
                                                        alt="{{ $product->name }}" loading="lazy" />
                                                    <div class="absolute inset-0 rounded-full shadow-inner"
                                                        aria-hidden="true"></div>
                                                </div>
                                                <div>
                                                    <p class="font-semibold">{{ $product->name }}</p>
                                                    <p class="text-xs text-gray-600">
                                                        {{ $product->category }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-sm ">
                                            {{ $product->quantity }}
                                        </td>
                                        <td class="px-4 py-3 text-xs">
                                            $ {{ $product->price }}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            6/10/2020
                                        </td>
                                        <td class="text-center">
                                            <button id="dropdownDefaultButton"
                                                data-dropdown-toggle="dropdown{{ $product->id }}"
                                                class="text-gray-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2 text-center inline-flex items-center"
                                                type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                                </svg>
                                            </button>
                                            <div id="dropdown{{ $product->id }}"
                                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-44 ">
                                                <ul class="py-2 text-sm text-gray-700"
                                                    aria-labelledby="dropdownDefaultButton">
                                                    <li>
                                                        <a href="{{ route('products.show', $product->id) }}"
                                                            class="block px-4 py-2 hover:bg-gray-100 ">View</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('products.edit', $product->id) }}"
                                                            class="block px-4 py-2 hover:bg-gray-100 ">Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">
                                                            <form action="{{ route('products.destroy', $product->id) }}"
                                                                method="POST" style="display: inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger"
                                                                    onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                                            </form>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="px-4 py-3 text-center text-gray-500">
                                        There's no product !!
                                    </td>
                                </tr>
                            @endif
                        </tbody>

                    </table>

                    <div class="p-4">{{ $products->links() }}</div>
                </div>
            </div>
        </div>

    </section>
  
@endsection --}}
