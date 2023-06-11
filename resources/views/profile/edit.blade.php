<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <div class="grid gap-6 mb-6 md:grid-cols-2">


                <div
                    class="w-full grid gap-4 grid-cols-1 p-4 items-center justify-center sm:p-8 bg-white shadow sm:rounded-lg">
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
                    </div>
                </div>

                <div class=" grid gap-4 sm:grid-cols-1 p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                    <div>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Profile Image') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Update your account's profile Image.") }}
                        </p>
                    </div>

                    <form method="post" action="{{ route('users.update', $user->id) }}"
                        class=" grid gap-4 sm:grid-cols-1" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div class="max-w-xl">
                            <div class="flex items-center justify-center w-full">
                                <label for="image"
                                    class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 ">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                            </path>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 ">
                                            <span
                                                class="font-semibold">
                                                Click to upload
                                            </span> or drag and drop
                                        </p>
                                        <p class="text-xs text-gray-500 ">
                                            SVG, PNG, JPG or GIF (MAX.800x400px)
                                        </p>
                                    </div>
                                    <input id="image" type="file" id="image" name="image" class="hidden" />
                                </label>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>

                            @if (session('status') === 'profile-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>



                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
