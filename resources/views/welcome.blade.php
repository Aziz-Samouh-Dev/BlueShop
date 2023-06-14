@extends('layouts.navbarHome')

@section('content')
    <main>
        <div class="relative swiper-container w-full h-full bg-gray-700 overflow-x-hidden">
            <div class="swiper-wrapper">
                @foreach ($categorys as $key => $category)
                    <div class="swiper-slide" data-delay="20000">
                        <img src="{{ asset('images/categories/' . $category->image) }}" class="w-full object-cover"
                            style="height: 70vh" alt="...">
                    </div>
                @endforeach
            </div>
            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        </div>

        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        <script>
            var swiper = new Swiper('.swiper-container', {
                loop: true,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },
                speed: 2000,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                on: {
                    slideVisible: function() {
                        this.slides[this.activeIndex].classList.remove('swiper-slide-hidden');
                    }
                }
            });
        </script>

        <style>
            .swiper-slide {
                transition-duration: 2s;
                transition-timing-function: ease;
            }
        </style>

        <div class="container mx-auto border-b p-4 bg-white md:p-8">
            <dl
                class="grid max-w-screen-xl grid-cols-2 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-3 xl:grid-cols-6 sm:p-8">
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl font-extrabold">73M+</dt>
                    <dd class="text-gray-500">Developers</dd>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl font-extrabold">100M+</dt>
                    <dd class="text-gray-500">Public repositories</dd>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl font-extrabold">1000s</dt>
                    <dd class="text-gray-500">Open source projects</dd>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl font-extrabold">1B+</dt>
                    <dd class="text-gray-500">Contributors</dd>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl font-extrabold">90+</dt>
                    <dd class="text-gray-500">Top Forbes companies</dd>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl font-extrabold">4M+</dt>
                    <dd class="text-gray-500">Organizations</dd>
                </div>
            </dl>
        </div>
        <div class="bg-white">
            <main class="my-8">
                <div class="container mx-auto px-6">
                    <h3 class="text-gray-600 text-2xl font-medium mb-3">Category</h3>
                    <div class="grid gap-4">
                        @foreach ($categorys as $key => $category)
                            <div class="h-64 hover:shadow-xl rounded-md overflow-hidden bg-cover bg-center @if ($key == 0) col-span-2 @elseif ($key == 1) col-span-1  @else col-span-1 bg-bottom @endif "
                                style="background-image: url('{{ asset('images/categories/' . $category->image) }}')">
                                <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                                    <div class="px-10 max-w-xl">
                                        <h2 class="text-4xl text-white font-semibold">
                                            {{ $category->name }}
                                        </h2>
                                        <p class="mt-2 text-gray-200">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente,
                                            numquam atque dignissimos voluptas,
                                        </p>
                                        <a href="{{ route('pro') }}">
                                            <button
                                                class="flex items-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                                <span>Shop Now</span>
                                                <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                                </svg>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                    @foreach ($categorys as $category)
                        <div class="my-16">
                            <h3 class="text-gray-600 text-2xl font-medium pb-8">{{ $category->name }}</h3>
                            <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
                                @foreach ($category->products as $item)
                                    <div
                                        class="w-full hover:shadow-xl shadow-md bg-white border border-gray-200 rounded-lg">
                                        <a href="{{ route('product.show', $item->id) }}" style="height: 200px;">
                                            <img class="rounded-t-lg w-full " style="height: 200px; object-fit: cover;"
                                                src="{{ asset('images/' . $item->images[0]->filename) }}"
                                                alt="product image" />
                                        </a>
                                        <div class="px-3 py-2">
                                            <div class="font-bold text-xl">
                                                {{ strlen($item->name) > 38 ? substr($item->name, 0, 38) . '...' : $item->name }}
                                            </div>

                                            <p class="text-gray-700 text-md">{{ $item->category->name }}</p>
                                            <div class="flex items-center justify-between">
                                                <span class="text-xl font-bold text-gray-900">${{ $item->price }}</span>
                                                <a href="{{ url('product/' . $item->id) }}"
                                                    class="add-to-cart text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    @endforeach


                    {{-- <div class="w-full bg-white">

                        <div class="border-gray-200 ">
                            <div class="border-b p-5 bg-white rounded-lg md:p-8 bg-gray-300">
                                <h2 class="mb-4 text-2xl font-extrabold tracking-tight text-gray-900">
                                    We invest
                                    in the world’s potential</h2>
                                <ul role="list" class="space-y-4 text-gray-500">
                                    <li class="flex space-x-2">
                                        <svg class="flex-shrink-0 w-4 h-4 text-blue-600" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="leading-tight">Dynamic reports and dashboards</span>
                                    </li>
                                    <li class="flex space-x-2">
                                        <svg class="flex-shrink-0 w-4 h-4 text-blue-600" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="leading-tight">Templates for everyone</span>
                                    </li>
                                    <li class="flex space-x-2">
                                        <svg class="flex-shrink-0 w-4 h-4 text-blue-600" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="leading-tight">Development workflow</span>
                                    </li>
                                    <li class="flex space-x-2">
                                        <svg class="flex-shrink-0 w-4 h-4 text-blue-600" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="leading-tight">Limitless business automation</span>
                                    </li>
                                </ul>
                            </div>

                            <section class="my-25 text-gray-800 text-center">

                                <div class="px-6 py-12 md:px-12">
                                    <div class=" mx-auto xl:px-32">
                                        <div class="grid lg:grid-cols-2 flex items-center">
                                            <div class="z-20 md:mt-12 lg:mt-0 mb-12 lg:mb-0">
                                                <div class="block rounded-lg shadow-lg px-6 py-12 md:px-12 lg:-mr-14"
                                                    style="background: hsla(0, 0%, 100%, 0.55); backdrop-filter: blur(30px)">
                                                    <h2 class="text-3xl font-bold mb-12">Contact us</h2>
                                                    <form>
                                                        <div class="form-group mb-6">
                                                            <input type="text"
                                                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                                id="exampleInput7" placeholder="Name" />
                                                        </div>
                                                        <div class="form-group mb-6">
                                                            <input type="email"
                                                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                                id="exampleInput8" placeholder="Email address" />
                                                        </div>
                                                        <div class="form-group mb-6">
                                                            <textarea
                                                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                                id="exampleFormControlTextarea13" rows="3" placeholder="Message"></textarea>
                                                        </div>
                                                        <div class="form-group form-check text-center mb-6">
                                                            <input type="checkbox"
                                                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain mr-2 cursor-pointer"
                                                                id="exampleCheck87" checked />
                                                            <label class="form-check-label inline-block text-gray-800"
                                                                for="exampleCheck87">Send me a copy of this
                                                                message</label>
                                                        </div>
                                                        <button type="submit"
                                                            class="w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                                            Send
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="z-0 md:mb-12 lg:mb-0 ">
                                                <div class="relative shadow-lg rounded-lg">
                                                    <iframe
                                                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31153.35325925528!2d-9.6081057!3d30.3916449!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdb3b7c0bb8a4057%3A0x30eea45209efa340!2sDunes%20Golf%20Club%20Red%20Course%20Tamarisk!5e1!3m2!1sfr!2sma!4v1685298094869!5m2!1sfr!2sma"
                                                        class="left-0 top-0 rounded-lg w-full" height="600"
                                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>



                            <div class=" border-t p-5 bg-gray-100 rounded-lg md:p-8">
                                <div id="accordion-flush" data-accordion="collapse" data-active-classes="text-gray-900"
                                    data-inactive-classes="text-gray-500">
                                    <h2 id="accordion-flush-heading-1">
                                        <button type="button"
                                            class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200 "
                                            data-accordion-target="#accordion-flush-body-1" aria-expanded="true"
                                            aria-controls="accordion-flush-body-1">
                                            <span>What is Flowbite?</span>
                                            <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-flush-body-1" class="hidden"
                                        aria-labelledby="accordion-flush-heading-1">
                                        <div class="py-5 border-b border-gray-200 ">
                                            <p class="mb-2 text-gray-500">Flowbite is an
                                                open-source
                                                library
                                                of interactive components built on top of Tailwind CSS including
                                                buttons,
                                                dropdowns, modals, navbars, and more.</p>
                                            <p class="text-gray-500">Check out this guide to
                                                learn
                                                how to <a href="/docs/getting-started/introduction/"
                                                    class="text-blue-600 hover:underline">get
                                                    started</a>
                                                and start developing websites even faster with components on top of
                                                Tailwind
                                                CSS.</p>
                                        </div>
                                    </div>
                                    <h2 id="accordion-flush-heading-2">
                                        <button type="button"
                                            class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200 "
                                            data-accordion-target="#accordion-flush-body-2" aria-expanded="false"
                                            aria-controls="accordion-flush-body-2">
                                            <span>Is there a Figma file available?</span>
                                            <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-flush-body-2" class="hidden"
                                        aria-labelledby="accordion-flush-heading-2">
                                        <div class="py-5 border-b border-gray-200 ">
                                            <p class="mb-2 text-gray-500">Flowbite is first
                                                conceptualized
                                                and designed using the Figma software so everything you see in the
                                                library has a
                                                design equivalent in our Figma file.</p>
                                            <p class="text-gray-500">Check out the <a href="https://flowbite.com/figma/"
                                                    class="text-blue-600 hover:underline">Figma
                                                    design
                                                    system</a> based on the utility classes from Tailwind CSS and
                                                components
                                                from Flowbite.</p>
                                        </div>
                                    </div>
                                    <h2 id="accordion-flush-heading-3">
                                        <button type="button"
                                            class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200 "
                                            data-accordion-target="#accordion-flush-body-3" aria-expanded="false"
                                            aria-controls="accordion-flush-body-3">
                                            <span>What are the differences between Flowbite and Tailwind UI?</span>
                                            <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-flush-body-3" class="hidden"
                                        aria-labelledby="accordion-flush-heading-3">
                                        <div class="py-5 border-b border-gray-200 ">
                                            <p class="mb-2 text-gray-500">The main difference is
                                                that the
                                                core components from Flowbite are open source under the MIT license,
                                                whereas
                                                Tailwind UI is a paid product. Another difference is that Flowbite
                                                relies on
                                                smaller and standalone components, whereas Tailwind UI offers
                                                sections
                                                of pages.
                                            </p>
                                            <p class="mb-2 text-gray-500">However, we actually
                                                recommend
                                                using both Flowbite, Flowbite Pro, and even Tailwind UI as there is
                                                no
                                                technical
                                                reason stopping you from using the best of two worlds.</p>
                                            <p class="mb-2 text-gray-500">Learn more about these
                                                technologies:</p>
                                            <ul class="pl-5 text-gray-500 list-disc">
                                                <li><a href="https://flowbite.com/pro/"
                                                        class="text-blue-600 hover:underline">Flowbite
                                                        Pro</a></li>
                                                <li><a href="https://tailwindui.com/" rel="nofollow"
                                                        class="text-blue-600 hover:underline">Tailwind
                                                        UI</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>
            </main>

        </div>
    </main>
@endsection
