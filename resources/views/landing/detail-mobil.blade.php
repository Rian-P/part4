@extends('landing.layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prapatan Jaya Trans</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

</head>

<body class="bg-gray-200">

    {{-- penyewaan detail-mobil  --}}
    <section>

        <div id="{{$detail_kendaraan->nama_kendaraan}}" class=" px-5 py-24 mx-auto  lg:w-4/6 mx-auto">
            <div>
                <img src="{{ asset('storage/image/kendaraan/' . $detail_kendaraan->image) }}" alt=" random imgee"
                    class="w-full object-cover object-center rounded-lg shadow-md">

                <div class="relative px-4 -mt-16  ">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <div class="flex items-baseline">
                            <span
                                class="bg-teal-200 text-teal-800 text-xs px-2 inline-block rounded-full  uppercase font-semibold tracking-wide">
                                New
                            </span>
                            <div class="ml-2 text-gray-600 uppercase text-xs font-semibold tracking-wider">
                                {{ $detail_kendaraan->max_penumpang }}</span> Penumpang
                            </div>
                        </div>

                        <h4 class="mt-1 text-xl font-semibold uppercase leading-tight truncate">
                            {{ $detail_kendaraan->nama_kendaraan }}</h4>

                        <div class="mt-1">
                            Rp .{{ $detail_kendaraan->harga_24_jam }}
                            <span class="text-gray-600 text-sm"> /24jam</span>
                        </div>
                        <div class="mt-4">
                            <span class="text-gray-600 text-sm"> {!! $detail_kendaraan->deskripsi !!}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    {{-- formulir penyewaan detail-mobil  --}}
    <section class=" py-1 bg-blueGray-50">
        <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                    <div class="text-center flex justify-between">
                        @if (Auth::check())
                        <h6 class="text-blueGray-700 text-xl font-bold">
                            My account
                        </h6>
                        @else
                        <h6 id="{{$detail_kendaraan->id_mobil}}" class="text-blueGray-700 text-xl font-bold">
                            Information
                        </h6>
                        @endif

                    </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                    <form action="/booking" class="space-y-4" method="post" enctype="multipart/form-data">
                        @csrf
                        @if (Auth::check())
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            User pemesanan
                        </h6>
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label for="nama_pelanggan"
                                        class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Nama</label>
                                    @if (Auth::check())
                                    <input type="text" name="nama_pelanggan" id="nama_pelanggan" placeholder="Nama"
                                        value="{{ Auth::user()->nama }}" required readonly
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                    <input type="hidden" name="id_pelanggan" id="nama_pelanggan" placeholder="Nama"
                                        value="{{ Auth::user()->id }}" required readonly
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                    @else
                                    <input type="text" name="nama_pelanggan" id="nama_pelanggan" placeholder="Nama"
                                        required readonly
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                    @endif
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label for="tujuan" class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Tujuan Kota
                                    </label>
                                    <input type="text" name="tujuan" id="tujuan" placeholder="Tujuan" required
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label for="sopir"
                                        class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Opsi
                                        Sopir</label>
                                    <select name="sopir" id="sopir" required
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                        <option selected disabled value="">-- Opsi Sopir --</option>
                                        <option value="Menggunakan Sopir">Menggunakan Sopir</option>
                                        <option value="Tidak Menggunakan Sopir">Tidak Menggunakan Sopir</option>
                                    </select>
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label for="nama_kendaraan"
                                        class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Nama
                                        Kendaraan</label>
                                    <input type="text" name="nama_kendaraan" id="nama_kendaraan"
                                        value="{{ $detail_kendaraan->nama_kendaraan }}"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        placeholder="Nama Kendaraan" required readonly>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-6 border-b-1 border-blueGray-300">

                        <h6 id="{{$detail_kendaraan->id_mobil}}"
                            class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Information
                        </h6>
                        @else
                        @endif
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label for="harga_sewa"
                                        class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Harga
                                        Sewa</label>
                                    <input type="text" id="harga_sewa" name="harga_sewa"
                                        value="{{$detail_kendaraan->harga_24_jam}}"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        placeholder="Harga Sewa" readonly required>
                                </div>
                            </div>

                         
                            
                            <div id="{{$detail_kendaraan->id_mobil}}" class="w-full lg:w-1/2 px-4">
                                <div class="relative w-full mb-3">
                                    <label for="tanggal_ambil"
                                        class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Tanggal
                                        Ambil</label>
                                    <input  type="text" id="tanggal_ambil" name="tanggal_ambil"
                                        min="<?= date('Y-m-d') ?>"
                                        class=" border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        id="exampleFormControlInput1" placeholder="Tanggal Ambil" required>
                                </div>
                                 
                            </div>
                            <div  id="{{$detail_kendaraan->id_mobil}}" class="w-full lg:w-1/2 px-4">
                                <div class="relative w-full mb-3">
                                    <label for="tanggal_kembali"
                                        class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                        Pengembalian</label>
                                    <input type="text" id="tanggal_kembali" name="tanggal_kembali"
                                        min="<?= date('Y-m-d') ?>"
                                        class="border-0 px-3 py-3  text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-15"
                                        placeholder="Tanggal Kembali" onchange="hitungTotalHarga()" required>
                                </div>
                            </div>
                            @if (Auth::check())
                            <div class="w-full lg:w-1/2 px-4">
                                <div class="relative w-full mb-3">
                                    <label for="waktu_ambil"
                                        class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Jam
                                        Pengambilan</label>
                                    <input type="time" id="waktu_ambil" name="waktu_ambil"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-15"
                                        placeholder="Jam Pengambilan" onchange="setKembali()" required>
                                </div>
                            </div>
                            <div class="w-full lg:w-1/2 px-4">
                                <div class="relative w-full mb-3">
                                    <label for="waktu_kembali"
                                        class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Jam
                                        Pengembalian</label>
                                    <input type="time" id="waktu_kembali" name="waktu_kembali"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-15"
                                        placeholder="Jam Pengembalian" required>
                                </div>
                            </div>
                            @else
                            @endif

                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label for="total_harga"
                                    class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Harga
                                    Total</label>
                                <input type="text" name="total_harga" id="total_harga" class="form-control"
                                    id="exampleFormControlInput1" placeholder="Harga Total" readonly required>
                            </div>
                        </div>
                        <hr class="mt-6 border-b-1 border-blueGray-300">

                        @if (Auth::check())
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Foto KTP
                        </h6>

                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <div class="mb-4">
                                    <label for="foto_ktp" class="block text-gray-700 font-bold text-lg mb-2">Foto KTP
                                        (PNG/JPG)</label>
                                    <input type="file" name="foto_ktp" id="foto_ktp"
                                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-lg"
                                        accept=".png, .jpg, .jpeg" required>
                                </div>
                                <div id="previewContainer"></div>
                            </div>
                        </div>

                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            <i class="fa-solid fa-floppy-disk mr-2"></i> Booking
                        </button>
                        @else
                        <a href="{{route('login.index')}}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            <i class="fa-solid fa-floppy-disk mr-2"></i> Booking
                        </a>
                        @endif

                    </form>
                </div>
            </div>

        </div>
    </section>

    
    <script>
    document.getElementById('foto_ktp').addEventListener('change', function(event) {
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
 
 <!-- <script>
        $(document).ready(function() {
            // Mengambil data dari database menggunakan AJAX
            $.ajax({
                url: "/get-disabled-dates/{{$detail_kendaraan->nama_kendaraan}}", // Ubah URL sesuai dengan rute yang digunakan untuk mendapatkan data dari database
                method: "GET",
                success: function(response) {
                    var datesForDisable = response.dates;
                    $('.datepicker').datepicker({
                        dateFormat: 'yy-mm-dd',
                        autoclose: true,
                        beforeShowDay: function(date) {
                            var year = date.getFullYear();
                            var month = ("0" + (date.getMonth() + 1)).slice(-2);
                            var day = ("0" + date.getDate()).slice(-2);
                            var formattedDate = year + "-" + month + "-" + day;
                            var isDisabled = (datesForDisable.indexOf(formattedDate) !== -1);
                            return [!isDisabled];
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
</script> -->
<script>
    $(document).ready(function() {
  $.ajax({
    url: "/get-disabled-dates/{{$detail_kendaraan->nama_kendaraan}}",
    method: "GET",
    success: function(response) {
      var datesForDisable = response.dates;
      $('#tanggal_ambil').datepicker({
        dateFormat: 'yy-mm-dd',
        autoclose: true,
        beforeShowDay: function(date) {
          var selectedDate = $('#tanggal_ambil').val(); // Get the selected date from the input field
          var year = date.getFullYear();
          var month = ("0" + (date.getMonth() + 1)).slice(-2);
          var day = ("0" + date.getDate()).slice(-2);
          var formattedDate = year + "-" + month + "-" + day;
          var isDisabled = (datesForDisable.indexOf(formattedDate) !== -1);
          return [!isDisabled];
        }
      });
    },
    error: function(xhr, status, error) {
      console.log(error);
    }
  });
});

</script>
<script>
    $(document).ready(function() {
  $.ajax({
    url: "/get-disabled-dates1/{{$detail_kendaraan->nama_kendaraan}}",
    method: "GET",
    success: function(response) {
      var datesForDisable = response.dates;
      $('#tanggal_kembali').datepicker({
        dateFormat: 'yy-mm-dd',
        autoclose: true,
        beforeShowDay: function(date) {
          var selectedDate = $('#tanggal_kembali').val(); // Get the selected date from the input field
          var year = date.getFullYear();
          var month = ("0" + (date.getMonth() + 1)).slice(-2);
          var day = ("0" + date.getDate()).slice(-2);
          var formattedDate = year + "-" + month + "-" + day;
          var isDisabled = (datesForDisable.indexOf(formattedDate) !== -1);
          return [!isDisabled];
        }
      });
    },
    error: function(xhr, status, error) {
      console.log(error);
    }
  });
});

</script>
    <script>
    function hitungTotalHarga() {
        const hargaSewa = document.getElementById('harga_sewa').value;
        const tanggalAwal = new Date(document.getElementById('tanggal_ambil').value);
        const tanggalAkhir = new Date(document.getElementById('tanggal_kembali').value);

        const selisihHari = Math.round((tanggalAkhir - tanggalAwal) / (1000 * 60 * 60 * 24));
        document.getElementById('total_harga').value = hargaSewa * selisihHari;
    }

    function setKembali() {
        var ambil = document.getElementById("waktu_ambil").value;
        var ambilTime = new Date("1970-01-01T" + ambil + ":00");
        var kembaliTime = new Date(ambilTime.getTime());
        var kembali = kembaliTime.toTimeString().slice(0, 5);
        document.getElementById("waktu_kembali").value = kembali;
    }
    </script>
</body>

</html>
@endsection