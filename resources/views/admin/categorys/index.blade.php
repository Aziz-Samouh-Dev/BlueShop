@extends('dashboard')
@section('title', 'Categotys')

@section('content')
    <section class="h-full overflow-y-auto p-4">
        <div class="container mx-auto grid  ">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 leading-tight ">
                {{ __('Categotys') }}
            </h2>


            <div class="w-full overflow-hidden bg-white shadow-lg rounded-lg ">
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
                                placeholder="Search for categorys ... " type="text" name="search" id="search-input" />
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
                    <div class="grid gap-6  md:grid-cols-3 ">
                        @foreach ($categorys as $category)
                            <div style="background-image:url('{{ asset('images/categories/' . $category->image) }}' );"
                                class="w-full bg-bottom bg-cover max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                                <div class="flex justify-end px-4 pt-4">
                                    <button id="dropdownButton" data-dropdown-toggle="dropdown{{$category->id}}"
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
                                    <div id="dropdown{{$category->id}}"
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
                                                        method="POST" class="grid" >
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
                                        <div class="grid w-full h-full  shadow-lg bg-gray-800/50 p-6 rounded-lg ">

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
    </section>
@endsection
