@extends('landing.layouts.app')

@section('content')
@include('sweetalert::alert')

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="icon" type="image/png" sizes="56x56" href="images/icon/iconbg.png" />

        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    </head>

    <body class="#">
        {{-- menampilkan slide  --}}
        <section>

            <div id="default-carousel" class="relative" data-carousel="slide" class="h-auto max-w-full ">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="images/background/slide1.png"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="images/background/slide2.png"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="images/background/slide3.png"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 4 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="images/background/slide1.png"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 5 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="images/background/slide2.png"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                        data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                        data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                        data-carousel-slide-to="2"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                        data-carousel-slide-to="3"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                        data-carousel-slide-to="4"></button>
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </section>
        <!-- hero -->
        <section class="text-black-600 body-font my-16 mx-auto px-5 md:max-w-6xl">
            <div class="container border md:max-w-6xl bg-stone-100 mx-10 flex px-5 py-10  md:flex-row flex-col ">
                <div
                    class="lg:flex-grow pl-10 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center">
                    <p class=" text-[14px] text-gray-600 flex items-center">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.71 7.20998C18.617 7.11625 18.5064 7.04186 18.3846 6.99109C18.2627 6.94032 18.132 6.91418 18 6.91418C17.868 6.91418 17.7373 6.94032 17.6154 6.99109C17.4936 7.04186 17.383 7.11625 17.29 7.20998L9.84001 14.67L6.71001 11.53C6.61349 11.4367 6.49955 11.3634 6.37469 11.3142C6.24984 11.265 6.11651 11.2409 5.98233 11.2432C5.84815 11.2455 5.71574 11.2743 5.59266 11.3278C5.46959 11.3812 5.35825 11.4585 5.26501 11.555C5.17177 11.6515 5.09846 11.7654 5.04925 11.8903C5.00005 12.0152 4.97592 12.1485 4.97824 12.2827C4.98056 12.4168 5.00929 12.5493 5.06278 12.6723C5.11628 12.7954 5.19349 12.9067 5.29001 13L9.13001 16.84C9.22297 16.9337 9.33358 17.0081 9.45543 17.0589C9.57729 17.1096 9.708 17.1358 9.84001 17.1358C9.97202 17.1358 10.1027 17.1096 10.2246 17.0589C10.3464 17.0081 10.457 16.9337 10.55 16.84L18.71 8.67998C18.8115 8.58634 18.8925 8.47269 18.9479 8.34619C19.0033 8.21969 19.0319 8.08308 19.0319 7.94498C19.0319 7.80688 19.0033 7.67028 18.9479 7.54378C18.8925 7.41728 18.8115 7.30363 18.71 7.20998V7.20998Z"
                                fill="#198754" />
                        </svg>


                        PT PRAPATAN JAYA TRANS

                    </p>
                    <p class="text-black-900 text-[25px] font-bold ">Pusat Sewa Mobil Terbesar di Tegal dengan Armada
                        terlengkap kami siap memenuhi kebutuhan transportasi
                    </p>
                    <p class="text-gray-700 text-base mb-8">anda dengan pelayanan terbaik dan Profesional</p>

                    <form class="flex items-center" action="{{ route('home.search') }}" method="GET">

                        <div class="relative ">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none ">
                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20.71 19.29L17 15.61C18.4401 13.8144 19.1375 11.5353 18.9488 9.2413C18.7601 6.9473 17.6997 4.81278 15.9855 3.27664C14.2714 1.7405 12.0338 0.919506 9.73295 0.982466C7.43207 1.04543 5.24275 1.98756 3.61517 3.61514C1.98759 5.24272 1.04546 7.43203 0.982497 9.73292C0.919537 12.0338 1.74053 14.2714 3.27667 15.9855C4.81281 17.6997 6.94733 18.7601 9.24133 18.9488C11.5353 19.1375 13.8144 18.4401 15.61 17L19.29 20.68C19.383 20.7737 19.4936 20.8481 19.6154 20.8989C19.7373 20.9497 19.868 20.9758 20 20.9758C20.132 20.9758 20.2627 20.9497 20.3846 20.8989C20.5065 20.8481 20.6171 20.7737 20.71 20.68C20.8903 20.4935 20.991 20.2443 20.991 19.985C20.991 19.7257 20.8903 19.4765 20.71 19.29ZM10 17C8.61556 17 7.26218 16.5895 6.11103 15.8203C4.95989 15.0511 4.06268 13.9579 3.53287 12.6788C3.00306 11.3997 2.86443 9.99223 3.13453 8.63436C3.40463 7.2765 4.07131 6.02922 5.05028 5.05025C6.02925 4.07128 7.27653 3.4046 8.63439 3.1345C9.99226 2.8644 11.3997 3.00303 12.6788 3.53284C13.9579 4.06265 15.0511 4.95986 15.8203 6.111C16.5895 7.26215 17 8.61553 17 10C17 11.8565 16.2625 13.637 14.9498 14.9497C13.637 16.2625 11.8565 17 10 17Z"
                                        fill="#F2404D" />
                                </svg>
                            </div>
                            <input type="text" id="simple-search"
                                class="bg-background border border-white-300 text-black-900 text-sm rounded-lg focus:ring-black-500  w-full pl-16 pr-10 py-2.5 "
                                type="text" name="search" placeholder="Cari mobil..." required>

                        </div>
                        <button type="submit"
                            class="p-2.5 ml-2 text-sm font-medium text-white bg-red-700 rounded-lg border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 ">cari
                            mobil

                            <span class="sr-only"></span>
                        </button>
                    </form>

                </div>
                <div class="lg:max-w-lg lg:w-full pl-5  w-6/6">
                    <img class="lg:w-full" src="images/background/alphard colors black.png" alt="image description">
                </div>
            </div>
        </section>
        <!-- hero -->

        <!-- kategori -->
        <section class="text-gray-600 body-font">
            <div class="container px-24 pb-10 mx-auto">
                <div class="flex flex-wrap -m-4">
                    <div class="p-4 lg:w-1/3 md:w-1/1">
                        <div class="h-full flex flex-col items-center text-center">
                            <img alt="team" class="flex-shrink-0 rounded-lg  object-cover object-center mb-4"
                                src="images/background/sewa.png">
                            <div class="w-full">
                                <a href="">
                                    <p class="title-font mt-2 font-semibold text-2xl text-gray-900">sewa all in</p>
                                </a>
                                <a>
                                    <p class="title-font mt-2 font-semibold  text-gray-900">Sewa Mobil dengan layanan<br>
                                        driver prapatan jaya yang nyaman <br>, berpengalaman dan profesional</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 lg:w-1/3 md:w-1/1">
                        <div class="h-full flex flex-col items-center text-center">
                            <img alt="team" class="flex-shrink-0 rounded-lg  object-cover object-center mb-4"
                                src="images/background/lepas.png">
                            <div class="w-full">
                                <a href="">
                                    <p class="title-font mt-2 font-semibold text-2xl text-gray-900">lepas kunci</p>
                                </a>
                                <a>
                                    <p class="title-font mt-2 font-semibold text-gray-900">Layanan sewa mobil tanpa driver
                                        <br>dengan armada terlengkap,<br>terbaru dan terawat</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 lg:w-1/3 md:w-1/1">
                        <div class="h-full flex flex-col items-center text-center">
                            <img alt="team" class="flex-shrink-0 rounded-lg  object-cover object-center mb-4"
                                src="images/background/shutlle.png">
                            <div class="w-full">
                                <a href="">
                                    <p class="title-font mt-2 font-semibold text-2xl text-gray-900">shuttle bus</p>
                                </a>
                                <a href="">
                                    <p class="title-font mt-2 font-semibold text-gray-900">Menyediakan ELf dan Hiace
                                        serta<br> mobil bus laiinya yang siap membawa <br>lebih banyak penumpang</p>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- kategori -->

        <!-- Card -->

        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
            
                <div class="flex flex-wrap justify-center sm:-m-4 -mx-4 -mb-10 -mt-4">
                    @foreach ($kendaraan as $row)
                        <div class="max-w-sm rounded overflow-hidden shadow-lg" >
                            <a href="/{{ $row->id_mobil }}">
                            <img class="w-full" src="{{ asset('storage/image/kendaraan/' . $row->image) }}">
                            </a>
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">{{ $row->nama_kendaraan }}</div>
                                <p class="text-gray-700 text-base">
                                    {!! $row->deskripsi !!}
                                </p>
                            </div>
                            <div class="px-6 pt-4 pb-2">
                                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Rp. {{ $row->harga_24_jam }} /24jam</span>
                                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"> {{ $row->tahun }}</span>
                                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"> kapasitas penumpang : {{ $row->max_penumpang }} orang</span>
                                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"> {{ $row->tipe }}</span>  
                            </div>
                        </div>
                    @endforeach
            </div>
                </div>
            </div>
        </section>

    </body>

    </html>
@endsection
