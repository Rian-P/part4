@extends('landing.layouts.app')

@section('content')
<!-- hero -->
<section class="text-black-600 body-font my-16 mx-auto px-5 md:max-w-6xl">
    <div class="text-xl">
        <p>Transaksi</p>
    </div>

    </div>
    @if (count($data) > 0)
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
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
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
                        @if($data->bukti_tf == null)
                        <!-- Modal toggle -->
                        <button data-modal-toggle="defaultModal{{$data->id_pemesanan}}"
                            class="block text-white bg-blue-500 hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-500 font-medium rounded-lg text-sm px-2  text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            Upload Bukti Transfer
                        </button>
                        @else
                        <!-- Modal toggle -->
                        <button data-modal-toggle="ViewKTP{{$data->id_pemesanan}}"
                            class="block text-white bg-blue-500 hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-500 font-medium rounded-lg text-sm px-2  text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            View Bukti Transfer
                        </button>
                        @endif

                    </td>
                    <td class="px-6 py-4">
                        Rp. {{ $data->total_harga }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        @if ($data->status == NULL )
                        <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Belum Melakukan
                            Pembayaran</a>
                        @elseif($data->status == 1)
                        <a href="#" class="font-medium text-yellow-600 dark:yellow-red-500 hover:underline">Menunggu
                            Persetujuan</a>
                        @else
                        <a href="#" class="font-medium text-green-600 dark:green-red-500 hover:underline">Disetujui</a>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        < <form id="printForm" method="post"
                            action="{{ route('print', ['id_pemesanan' => $data->id_pemesanan]) }}">
                            @csrf
                            <button type="submit" class="btn btn-success btn-lg p-2 m-2">
                                Download Invoice
                            </button>
                            </form>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</section>





<!-- Main modal -->
@include('landing.modalKTP')
@include('landing.modalViewKTP')

@endforeach

@else
<p>Belum ada pemesanan yang ditambahkan.</p>
@endif


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