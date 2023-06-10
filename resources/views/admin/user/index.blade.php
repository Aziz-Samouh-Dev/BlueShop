@extends('dashboard')

@section('title', 'Users')

@section('content')
    <section class="h-full overflow-y-auto p-4">
        <div class="container mx-auto grid  ">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 leading-tight ">
                {{ __('Users') }}
            </h2>


            <div class="w-full overflow-hidden bg-white shadow-lg rounded-lg ">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
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
                                placeholder="Search for Products ... " type="text" name="search" id="search-input" />
                        </label>
                    </div>
                </div>
                <div class="w-full overflow-x-auto p-4">
                    <table class="w-full whitespace-no-wrap bg-white ">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 bg-gray-100 uppercase border-b">
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Country</th>
                                <th class="px-4 py-3">Date</th>
                                <th class="px-4 py-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y ">
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
                                            <button id="dropdownDefaultButton"
                                                data-dropdown-toggle="dropdown{{ $user->id }}"
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
                                                <ul class="py-2 text-sm text-gray-700"
                                                    aria-labelledby="dropdownDefaultButton">
                                                    <li>
                                                        <a href="{{ route('users.show', $user->id) }}"
                                                            class="block px-4 py-2 hover:bg-gray-100 ">View</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">
                                                            <form action="{{ route('users.destroy', $user->id) }}"
                                                                method="POST" style="display: inline">
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
                                        There's no Users !!
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>


                    <div class="p-4">{{ $users->links() }}</div>
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
