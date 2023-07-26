@extends('landing.layouts.app')

@section('content')
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prapatan jaya trans</title>
    <link rel="icon" type="image/png" sizes="56x56" href="images/icon/iconbg.png" />
</head>

<body>
    <section class="font-inter">
        <div class="container px-24 pt-16 pb-6 mx-auto">
            <div class=" md:flex flex-wrap  ">
                <div class="container md:shrink-0 mx-auto flex flex-col px-5 ustify-center items-center">
                    <div class=" md:h-full md:w-68 md:w-2/3 flex flex-col mb-10 items-center text-center">
                        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-bold text-gray-900">Daftar Mobil</h1>
                        <p class=" leading-relaxed  text-gray-400">PT Prapatan Jaya Trans merupakan pusat layanan sewa
                            mobil terbesar di Tegal.Selain itu, PT Prapatan Jaya Trans menyediakan armada
                            terlengkap.Dengan armada yang lengkap, PT Prapatan Jaya Trans siap melayani kebutuhan
                            akomodasimu dengan pelayanan terbaik dan profesional.
                        </p>
                    </div>
                </div>
                <div class="flex w-full justify-center items-end">
                    <form class="flex items-center" action="{{ route('mobil.search') }}" method="GET">

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
                                class="md:flex flex-wrap bg-background border border-white-300 text-black-900 text-sm rounded-lg focus:ring-black-500  w-full pl-16 pr-10 py-2.5 "
                                type="text" name="search" placeholder="Cari mobil..." required>

                        </div>
                        <button type="submit"
                            class="md:flex flex-wrap p-2.5 ml-2 text-sm font-medium text-white bg-red-700 rounded-lg border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 ">cari
                            mobil
                            <span class="sr-only"></span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="text-gray-600 body-font">
        <div class="container px-40 py-10 mx-auto">
            <div class="flex flex-wrap -m-4 text-center">
                <div class="p-2 md:w-1/3 sm:w-1/2 ">
                    <div class="border-2 border-gray-200 px-2 py-4 rounded-lg">
                        <a href="#" class="text-base ">Matic</a>
                    </div>
                </div>
                <div class="p-2 md:w-1/3 sm:w-1/2">
                    <div class="border-2 border-gray-200 px-2 py-4 rounded-lg">
                        <a href="#" class="leading-relaxed">Manual</a>
                    </div>
                </div>
                <div class="p-2 md:w-1/3 sm:w-1/2 ">
                    <div class="border-2 border-gray-200 px-2 py-4 rounded-lg">
                        <a href="#" class="leading-relaxed">Bus</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="text-gray-600 body-font">
        <div class="container mx-auto py-36">
            <div class="flex flex-wrap justify-center">
                @foreach ($kendaraan as $row)
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/3 p-2 ">
                    <div class="max-w-sm mx-auto bg-white rounded-lg overflow-hidden shadow-lg ">
                        <a href="/{{ $row->id_mobil }}">
                            <img class="w-full h-64 object-cover"
                                src="{{ asset('storage/image/kendaraan/' . $row->image) }}"
                                alt="{{ $row->nama_kendaraan }}">
                        </a>
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">{{ $row->nama_kendaraan }}</div>
                        </div>
                        <div class="px-6 pt-4 pb-2">
                            <p class="text-gray-700 text-sm mb-2">Rp. {{ $row->harga_24_jam }} / 24 jam</p>
                            <p class="text-gray-700 text-sm mb-2">{{ $row->tahun }}</p>
                            <p class="text-gray-700 text-sm mb-2">kapasitas penumpang: {{ $row->max_penumpang }} orang
                            </p>
                            <p class="text-gray-700 text-sm mb-2">{{ $row->tipe }}</p>
                            <div class="flex justify-between mt-4">
                                <a href="/{{ $row->id_mobil }}#{{ $row->nama_kendaraan }}"
                                    class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                    View Detail
                                </a>
                                <a href="/{{ $row->id_mobil }}#{{ $row->id_mobil }}"
                                    class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                    Booking
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

</body>

</html>
@endsection