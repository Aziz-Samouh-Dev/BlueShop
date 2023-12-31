@extends('layouts.navbarHome')

@section('content')
    <section class="h-screen bg-gray-100 py-12 sm:py-16 lg:py-20">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-center">
                <h1 class="text-2xl font-semibold text-gray-900"></h1>
            </div>

            <div class="mx-auto mt-8 max-w-2xl md:mt-12">
                <div class="bg-white shadow">
                    <div class="px-4 py-6 sm:px-8 sm:py-10">

                        @csrf
                        <div class="fixed top-0 left-0 right-0 bottom-0 flex items-center justify-center bg-gray-200 z-50">
                            <style>
                                @import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);
                            </style>
                            <style>
                                .form-radio {
                                    -webkit-appearance: none;
                                    -moz-appearance: none;
                                    appearance: none;
                                    -webkit-print-color-adjust: exact;
                                    color-adjust: exact;
                                    display: inline-block;
                                    vertical-align: middle;
                                    background-origin: border-box;
                                    -webkit-user-select: none;
                                    -moz-user-select: none;
                                    -ms-user-select: none;
                                    user-select: none;
                                    flex-shrink: 0;
                                    border-radius: 100%;
                                    border-width: 2px;
                                }

                                .form-radio:checked {
                                    background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
                                    border-color: transparent;
                                    background-color: currentColor;
                                    background-size: 100% 100%;
                                    background-position: center;
                                    background-repeat: no-repeat;
                                }

                                @media not print {
                                    .form-radio::-ms-check {
                                        border-width: 1px;
                                        color: transparent;
                                        background: inherit;
                                        border-color: inherit;
                                        border-radius: inherit;
                                    }
                                }

                                .form-radio:focus {
                                    outline: none;
                                }

                                .form-select {
                                    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23a0aec0'%3e%3cpath d='M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z'/%3e%3c/svg%3e");
                                    -webkit-appearance: none;
                                    -moz-appearance: none;
                                    appearance: none;
                                    -webkit-print-color-adjust: exact;
                                    color-adjust: exact;
                                    background-repeat: no-repeat;
                                    padding-top: 0.5rem;
                                    padding-right: 2.5rem;
                                    padding-bottom: 0.5rem;
                                    padding-left: 0.75rem;
                                    font-size: 1rem;
                                    line-height: 1.5;
                                    background-position: right 0.5rem center;
                                    background-size: 1.5em 1.5em;
                                }

                                .form-select::-ms-expand {
                                    color: #a0aec0;
                                    border: none;
                                }

                                @media not print {
                                    .form-select::-ms-expand {
                                        display: none;
                                    }
                                }

                                @media print and (-ms-high-contrast: active),
                                print and (-ms-high-contrast: none) {
                                    .form-select {
                                        padding-right: 0.75rem;
                                    }
                                }
                            </style>

                            <div class="w-screen h-screen bg-gray-200 flex items-center justify-center px-5 pb-10 pt-16">
                                {{-- <form action="{{ route('payment.store') }}" method="post"> --}}
                                    <div style="width: 80%" class="mx-auto rounded-lg bg-white shadow-lg p-5 text-gray-700">
                                        <div class="w-full pt-1 pb-5">
                                            <div
                                                class="bg-indigo-500 text-white overflow-hidden rounded-full w-20 h-20 -mt-16 mx-auto shadow-lg flex justify-center items-center">
                                                <i class="mdi mdi-credit-card-outline text-3xl"></i>
                                            </div>
                                        </div>
                                        <div class="mb-10">
                                            <h1 class="text-center font-bold text-xl uppercase">Secure payment info</h1>
                                        </div>

                                        <input type="hidden" id="user_id" name="user_id" required>
                                        <div class="mb-3 flex -mx-2">
                                            <label for="type1" class="flex items-center cursor-pointer">
                                                <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png"
                                                    class="h-8 ml-3">
                                            </label>
                                        </div>
                                        <div class="mb-3">
                                            <label class="font-bold text-sm mb-2 ml-1" for="name_on_card">Name on
                                                card</label>
                                            <input
                                                class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                placeholder="John Smith" type="text" id="name_on_card"
                                                name="name_on_card" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="font-bold text-sm mb-2 ml-1" for="user_id">Name on
                                                card</label>
                                            <input
                                                class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                placeholder="John Smith" type="number" id="user_id"
                                                name="user_id" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="font-bold text-sm mb-2 ml-1" for="card_number">Card
                                                number</label>
                                            <input
                                                class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                placeholder="0000 0000 0000 0000" type="number" id="card_number"
                                                name="card_number" required>
                                        </div>
                                        <div class="mb-3 -mx-2 flex items-end">
                                            <div class="px-2 w-1/2">
                                                <label class="font-bold text-sm mb-2 ml-1" for="expiration_month">Expiration
                                                    date</label>
                                                <select id="expiration_month" type="number" name="expiration_month"
                                                    required
                                                    class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                                                    <option value="01">01 - January</option>
                                                    <option value="02">02 - February</option>
                                                    <option value="03">03 - March</option>
                                                    <option value="04">04 - April</option>
                                                    <option value="05">05 - May</option>
                                                    <option value="06">06 - June</option>
                                                    <option value="07">07 - July</option>
                                                    <option value="08">08 - August</option>
                                                    <option value="09">09 - September</option>
                                                    <option value="10">10 - October</option>
                                                    <option value="11">11 - November</option>
                                                    <option value="12">12 - December</option>
                                                </select>
                                            </div>
                                            <div class="px-2 w-1/2">
                                                <select
                                                    class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer"
                                                    type="number" id="expiration_year" name="expiration_year" required>
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                    <option value="2026">2026</option>
                                                    <option value="2027">2027</option>
                                                    <option value="2028">2028</option>
                                                    <option value="2029">2029</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-10 w-full">
                                            <label class="font-bold text-sm mb-2 ml-1" for="security_code">Security
                                                code</label>
                                            <input
                                                class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                placeholder="000" type="number" id="security_code" name="security_code"
                                                required>
                                        </div>
                                        <div class="grid grid-cols-2 gap-3">
                                            <a href="{{ route('pro') }}"
                                                class="flex text-center justify-center w-full max-w-xs mx-auto bg-red-500 hover:bg-red-700 focus:bg-red-700 text-white rounded-lg px-3 py-3 font-semibold">
                                                Cancel
                                            </a>
                                            <a href="{{ route('pro') }}"
                                                class="flex text-center justify-center w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold"><i
                                                    class="mdi mdi-lock-outline mr-1"></i>PAY NOW</a>
                                        </div>

                                    </div>
                                {{-- </form> --}}
                            </div>




                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
