@extends('dashboard')

@section('content')
    <main class="h-full overflow-y-auto  px-4">
        <div class="container mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                <!-- Card -->
                <div class="flex items-center p-4 bg-white rounded-lg shadow-md hover:shadow-lg ">
                    <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full ">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 ">
                            Total clients
                        </p>
                        <p class="text-lg font-semibold text-gray-700 ">
                            {{ Auth::user()->where('role', 'user')->count() }}
                        </p>
                    </div>
                </div>
                <!-- Card -->
                <div class="flex items-center p-4 bg-white rounded-lg shadow-md hover:shadow-lg ">
                    <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full ">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 ">
                            Account balance
                        </p>
                        <p class="text-lg font-semibold text-gray-700 ">
                            $ 46,760.89
                        </p>
                    </div>
                </div>
                <!-- Card -->
                <div class="flex items-center p-4 bg-white rounded-lg shadow-md hover:shadow-lg ">
                    <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full ">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 ">
                            New sales
                        </p>
                        <p class="text-lg font-semibold text-gray-700 ">
                            376
                        </p>
                    </div>
                </div>
                <!-- Card -->
                <div class="flex items-center p-4 bg-white rounded-lg shadow-md hover:shadow-lg ">
                    <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                            <path
                                d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375z" />
                            <path fill-rule="evenodd"
                                d="M3.087 9l.54 9.176A3 3 0 006.62 21h10.757a3 3 0 002.995-2.824L20.913 9H3.087zm6.163 3.75A.75.75 0 0110 12h4a.75.75 0 010 1.5h-4a.75.75 0 01-.75-.75z"
                                clip-rule="evenodd" />
                        </svg>


                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 ">
                            Total Products
                        </p>
                        <p class="text-lg font-semibold text-gray-700 ">
                            {{ $products->count() }}
                        </p>
                    </div>
                </div>
            </div>

            <h2 class="mb-6 text-2xl font-semibold text-gray-700 leading-tight">
                {{ __('Sales') }}
            </h2>
            <div class="w-full overflow-hidden bg-white shadow-lg ">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap bg-white ">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 bg-gray-100 uppercase border-b">
                                <th class="px-4 py-3">Client</th>
                                <th class="px-4 py-3">Amount</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Date</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y ">
                            <tr class="text-gray-700">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <!-- Avatar with inset shadow -->
                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full"
                                                src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                                alt="" loading="lazy" />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                            </div>
                                        </div>
                                        <div>
                                            <p class="font-semibold">Hans Burger</p>
                                            <p class="text-xs text-gray-600">
                                                10x Developer
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    $ 863.45
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        Approved
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    6/10/2020
                                </td>
                            </tr>

                            <tr class="text-gray-700">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <!-- Avatar with inset shadow -->
                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full"
                                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&facepad=3&fit=facearea&s=707b9c33066bf8808c934c8ab394dff6"
                                                alt="" loading="lazy" />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                            </div>
                                        </div>
                                        <div>
                                            <p class="font-semibold">Jolina Angelie</p>
                                            <p class="text-xs text-gray-600">
                                                Unemployed
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    $ 369.95
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                                        Pending
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    6/10/2020
                                </td>
                            </tr>

                            <tr class="text-gray-700">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <!-- Avatar with inset shadow -->
                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full"
                                                src="https://images.unsplash.com/photo-1551069613-1904dbdcda11?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                                alt="" loading="lazy" />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                            </div>
                                        </div>
                                        <div>
                                            <p class="font-semibold">Sarah Curry</p>
                                            <p class="text-xs text-gray-600">
                                                Designer
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    $ 86.00
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                        Denied
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    6/10/2020
                                </td>
                            </tr>

                            <tr class="text-gray-700">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <!-- Avatar with inset shadow -->
                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full"
                                                src="https://images.unsplash.com/photo-1546456073-6712f79251bb?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                                alt="" loading="lazy" />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                            </div>
                                        </div>
                                        <div>
                                            <p class="font-semibold">Wenzel Dashington</p>
                                            <p class="text-xs text-gray-600">
                                                Actor
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    $ 863.45
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">
                                        Expired
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    6/10/2020
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- New Table -->
            <div class="grid gap-6 mb-8 md:grid-cols-1 xl:grid-cols-2">
                <div class="block items-center py-4">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 leading-tight">
                        {{ __('Products') }}
                    </h2>
                    <div class="w-full overflow-hidden bg-white shadow-lg ">
                        <div class="w-full overflow-x-auto">
                            <table class="table-auto w-full text-gray-400 bg-gray-50">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b">
                                        <th class="px-4 py-3">Nome</th>
                                        <th class="px-4 py-3">Price</th>
                                        <th class="px-4 py-3">Date</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y ">
                                    @if (count($products) > 0)
                                        @foreach ($products->take(5) as $product)
                                            <tr class="text-gray-700">
                                                <td class="px-4 py-3">
                                                    <div class="flex items-center text-sm">
                                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                            <img class="object-cover w-full h-full rounded-full"
                                                                src="{{ asset('images/' . $product->images[0]->filename) }}"
                                                                alt="{{ $product->name }}" loading="lazy" />
                                                            <div class="absolute inset-0 rounded-full shadow-inner"
                                                                aria-hidden="true">
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <p class="font-semibold">{{ $product->name }}</p>
                                                            <p class="text-xs text-gray-600">
                                                                {{ $product->category }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 text-xs">
                                                    $ {{ $product->price }}
                                                </td>
                                                <td class="px-4 py-3 text-sm">
                                                    {{ $product->created_at->format('d/m/Y') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="px-4 py-3 text-center text-gray-500">
                                                It's emptyا
                                            </td>
                                        </tr>
                                    @endif


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="block items-center py-4">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 leading-tight">
                        {{ __('Users') }}
                    </h2>
                    <div class="min-w-0 bg-white shadow-lg rounded-sm border border-gray-200">
                        <div class="overflow-x-auto ">
                            <table class="table-auto w-full text-gray-400 bg-gray-50">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b">
                                        <th class="px-4 py-3">Name</th>
                                        <th class="px-4 py-3">Country</th>
                                        <th class="px-4 py-3">Date</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y ">

                                    @if (count($users->where('role', 'user')) > 0)
                                        @foreach ($users->where('role', 'user')->take(5) as $user)
                                            <tr class="text-gray-700">
                                                <td class="px-4 py-3">
                                                    <div class="flex items-center">
                                                        <!-- Avatar with inset shadow -->
                                                        <div class="relative hidden w-9 h-9 mr-3 rounded-full md:block">
                                                            <img class="object-cover w-full h-full rounded-full"
                                                                src="{{ asset('usersImg/' . $user->image) }}"
                                                                alt="" loading="lazy" />
                                                            <div class="absolute inset-0 rounded-full shadow-inner"
                                                                aria-hidden="true"></div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
