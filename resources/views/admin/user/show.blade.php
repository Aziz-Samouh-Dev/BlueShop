@extends('dashboard')

@section('title', 'User info')

@section('content')
    <section class="h-full overflow-y-auto p-4">
        <div class="container mx-auto grid  ">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 leading-tight ">
                {{ __('User info') }}
            </h2>

            <div class="w-full overflow-hidden bg-white shadow-lg rounded-lg flex items-center justify-center">

                <div class="w-full grid gap-4 grid-cols-1 p-4 items-center justify-center">
                    <div class="w-full">

                        <div class="w-full grid gap-4 grid-cols-1 justify-center items-center">
                            <div
                                class="relative w-full grid items-center  bg-white bg-clip-border shadow-3xl shadow-shadow-500 ">
                                <div class="relative flex h-32 w-full justify-center rounded-xl bg-cover">
                                    <img src='https://horizon-tailwind-react-git-tailwind-components-horizon-ui.vercel.app/static/media/banner.ef572d78f29b0fee0a09.png'
                                        class="absolute flex h-32 w-full justify-center rounded-xl bg-cover">

                                    <div
                                        class="absolute -bottom-12 flex h-[137px] w-[137px] items-center justify-center rounded-full border-[4px] border-white bg-pink-400 dark:!border-navy-700">
                                        <img class="flex h-[130px] w-[136px] rounded-full object-cover"
                                            src="{{ asset('usersImg/' . $user->image) }}" alt="User Image">
                                    </div>
                                </div>

                            </div>
                            <div class="mt-16 flex flex-col items-center">
                                <h4 class="text-xl font-bold text-gray-700">
                                    {{ __($user->name) }}
                                </h4>
                                <p class="text-base font-normal text-gray-600"> {{ __($user->email) }}</p>
                                <p class="font-normal mt-2 text-navy-700 mx-auto w-max">
                                    {{ __($user->country) }}
                                </p>
                            </div>
                        </div>


                        <div class="grid justify-center items-center gap-4 mt-4">

                            <a href="#"
                                class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150'">
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                    style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this user?')">Delete
                                        user</button>
                                </form>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
