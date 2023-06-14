@extends('dashboard')
@section('title', 'Orders')

@section('content')
    <section class="h-full overflow-y-auto p-4">
        <div class="container mx-auto grid  ">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 leading-tight ">
                {{ __('Orders') }}
            </h2>


            <div class="w-full overflow-hidden bg-white shadow-lg rounded-lg ">
                @if (session('success'))
                    <div id="alert-2" class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50" role="alert">
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
                            class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8"
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
                                placeholder="Search for Orders ... " type="text" name="search" id="search-input" />
                        </label>
                    </div>
                </div>
                <div class="w-full overflow-x-auto p-4">
                    <table class="w-full whitespace-no-wrap bg-white ">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 bg-gray-100 uppercase border-b">

                                <th class="px-4 py-3">Client</th>
                                <th class="px-4 py-3">Amount</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Date</th>
                                <th class="px-4 py-3">action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y ">
                            @auth
                                @if (Auth::user()->role === 'user')
                                    @foreach ($orders->where('user_id', Auth::user()->id) as $order)
                                        <tr class="text-gray-700">
                                            <td class="px-4 py-3">
                                                <div class="flex items-center text-sm">
                                                    <!-- Avatar with inset shadow -->
                                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">

                                                        <img class="object-cover w-full h-full rounded-full"
                                                            src="{{ asset('images/' . $order->product->images[0]->filename) }}"
                                                            alt="" loading="lazy" />


                                                        <div class="absolute inset-0 rounded-full shadow-inner"
                                                            aria-hidden="true">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold">{{ $order->product->name }}</p>
                                                        <p class="text-xs text-gray-600">
                                                            {{ $order->user->name }}

                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $order->quantity }}
                                            </td>
                                            <td class="px-4 py-3 text-xs">
                                                <span
                                                    class="px-2 py-2 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                    $ {{ $order->total_price }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $order->created_at->format('d/m/Y') }}
                                            </td>
                                            <td class="px-4 py-3 text-sm flex ">
                                                <a href="{{ route('orders.show', $order) }}">

                                                    <button
                                                        class="py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                                                        view
                                                    </button>
                                                </a>

                                                <p class="flex mx-2">

                                                    <form action="{{ route('orders.destroy', $order) }}" method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this order?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="py-2 px-4 bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </p>


                                            </td>
                                        </tr>
                                    @endforeach
                                @elseif (Auth::user()->role === 'admin')
                                    @foreach ($orders as $order)
                                        <tr class="text-gray-700">
                                            <td class="px-4 py-3">
                                                <div class="flex items-center text-sm">
                                                    <!-- Avatar with inset shadow -->
                                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">

                                                        <img class="object-cover w-full h-full rounded-full"
                                                            src="{{ asset('images/' . $order->product->images[0]->filename) }}"
                                                            alt="" loading="lazy" />


                                                        <div class="absolute inset-0 rounded-full shadow-inner"
                                                            aria-hidden="true">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold">{{ $order->product->name }}</p>
                                                        <p class="text-xs text-gray-600">
                                                            {{ $order->user->name }}

                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $order->quantity }}
                                            </td>
                                            <td class="px-4 py-3 text-xs">
                                                <span
                                                    class="px-2 py-2 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                    $ {{ $order->total_price }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $order->created_at->format('d/m/Y') }}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <a href="{{ route('orders.show', $order) }}">

                                                    <button
                                                        class="py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                                                        view
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            @endauth
                        </tbody>
                    </table>


                    {{-- <div class="p-4">{{ $orders->links() }}</div>


                    @if (count($users->where('role', 'user')) > 0)
                        @foreach ($users->where('role', 'user') as $user)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3">
                                    <div class="flex items-center">
                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full"
                                                src="{{ asset('usersImg/' . $user->image) }}" alt="User Image">

                                        </div>
                                        <div>
                                            <p class="font-semibold">{{ $user->name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $user->country }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $user->created_at->format('d/m/Y') }}
                                </td>
                                <td class="text-center">
                                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown{{ $user->id }}"
                                        class="text-gray-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2 text-center inline-flex items-center"
                                        type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                        </svg>
                                    </button>
                                    <div id="dropdown{{ $user->id }}"
                                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-44 ">
                                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                                            <li>
                                                <a href="{{ route('users.show', $user->id) }}"
                                                    class="block px-4 py-2 hover:bg-gray-100 ">View</a>
                                            </li>
                                            <li>
                                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">
                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                        style="display: inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
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
                                There's no Orders !!
                            </td>
                        </tr>
                    @endif --}}
                </div>
            </div>
        </div>
    </section>
    <span class="my-3 p-2">
        <hr>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var searchInput = document.getElementById('search-input');
                var rows = document.querySelectorAll('tbody tr');
                var noResultsMessage = document.getElementById('no-results-message');

                searchInput.addEventListener('input', function() {
                    var searchTerm = searchInput.value.toLowerCase();
                    var hasResults = false;

                    rows.forEach(function(row) {
                        var productName = row.querySelector('.font-semibold').innerText.toLowerCase();

                        if (productName.includes(searchTerm)) {
                            row.style.display = 'table-row';
                            hasResults = true;
                        } else {
                            row.style.display = 'none';
                        }
                    });

                    if (hasResults) {
                        noResultsMessage.style.display = 'none';
                    } else {
                        noResultsMessage.style.display = 'block';
                    }
                });
            });
        </script>
    </span>
@endsection
