@extends('landing.layouts.app')

@section('content')
    <!-- hero -->
    <section class="text-black-600 body-font my-16 mx-auto px-5 md:max-w-6xl">
        <div class="text-xl">
            <p>Transaksi </p>

        </div>
        @if (count($data) > 0)
            <table class="w-4/5 text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-900 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Mobil
                        </th>
                        <th scope="col" class="px-6 py-3">
                            waktu pengambilan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            waktu pengembalian
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Harga
                        </th>
                        <th scope="col" class="px-8 py-3">
                            pembayaran
                        </th>
                        <th scope="col" class="px-8 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Invoice
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $data)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $data->nama_pelanggan }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $data->nama_kendaraan }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $data->tanggal_ambil }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $data->tanggal_kembali }}
                            </td>
                            <td>
                                <!-- Modal toggle -->
                                <button data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                                    class="block text-white bg-blue-500 hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-500 font-medium rounded-lg text-sm px-2  text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    type="button">
                                    bukti transfer
                                </button>
                            </td>
                            <td class="px-6 py-4">
                                Rp. {{ $data->total_harga }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                @if ($data->status == null)
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Menunggu
                                        Persetujuan</a>
                                @else
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Disetujui</a>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <a href="/print/{{ $data->id_pemesanan }}">Download Invoice</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <p>Belum ada pemesanan yang ditambahkan.</p>
        @endif



        </tbody>
        </table>
        </div>
    </section>

    <!-- Main modal -->
    <div id="defaultModal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        pembayaran tranfer bca 87878
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="defaultModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">

                    <div class="mb-4">
                        <label for="bukti_tf" class="block text-gray-700 font-bold text-lg mb-2">Foto Bukti TF
                            (PNG/JPG)</label>
                        <input type="file" name="bukti_tf" id="bukti_tf"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-lg"
                            accept=".png, .jpg, .jpeg" required>
                    </div>
                    <div id="previewContainer"></div>

                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="defaultModal" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                        accept</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('bukti_tf').addEventListener('change', function(event) {
            var file = event.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var previewContainer = document.getElementById('previewContainer');
                previewContainer.innerHTML = '';

                var image = document.createElement('img');
                image.src = e.target.result;
                image.classList.add('w-1/4', 'h-auto', 'mt-4');
                previewContainer.appendChild(image);
            }

            reader.readAsDataURL(file);
        });
    </script>
@endsection
