@extends('dashboard.layouts.app')

@section('content')
<style>
/* Hide the "Tujuan Sopir" input field container by default */
#tujuanSopirInputContainer {
    display: none;
}
</style>

    <script>
        // Display a pop-up alert if validation failed
        window.onload = function() {
            @if (session('validationFailed'))
                alert("sopir telah digunakan ditanggal yang sama ");
            @endif
        };
    </script>


<div class="main-panel">
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="modal-header">
                            <h5 class="modal-title"><strong>Tambah Data Pemesan</strong></h5>
                        </div>
                        <form action="/add-pemesanan" class="form-car pt-4" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                <input type="text" name="nama_pelanggan" class="form-control"
                                    id="exampleFormControlInput1" placeholder="Nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Sopir</label>
                                <select class="form-select" name="sopir" id="sopirSelect"
                                    aria-label="Default select example" required onchange="toggleHargaForm()">
                                    <option selected disabled value="">-- Pilih Sopir --</option>
                                    <option value="tidak_menggunakan_sopir">Tidak menggunakan sopir</option>
                                    @foreach($supir as $s)
                                    <option value="{{$s->nama}}">{{$s->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="hargaForm" style="display: none;">
                                <label for="exampleFormControlInput1" class="form-label">harga sopir</label>
                                <select class="form-select" name="tujuan_sopir" id="harga"
                                    aria-label="Default select example">
                                    <option selected disabled value="">-- Pilih harga --</option>
                                    <option value="0">tidak menggunakan</option>
                                    @foreach($harga as $s)
                                    <option value="{{$s->harga}}" harga="{{$s->harga}}">{{$s->harga}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Input field for "Tujuan Sopir" -->

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">tujuan</label>
                                <input type="text" name="tujuan" class="form-control" id="exampleFormControlInput1"
                                    placeholder="tujuan" required>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nama Kendaraan</label>
                                        <select class="form-select" name="nama_kendaraan"
                                            aria-label="Default select example" required>
                                            <option selected disabled value="">-- Pilih Kendaraan --</option>
                                            @foreach($kendaraan as $kendaraan)
                                            <option value="{{$kendaraan->nama_kendaraan}}">
                                                {{$kendaraan->nama_kendaraan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1" class="form-label">Harga Sewa</label>
                                    <select class="form-select" id="harga_sewa" name="harga_sewa"
                                        aria-label="Default select example" required>
                                        <option selected disabled value="">-- Pilih Harga Sewa --</option>
                                        @foreach($sewa as $sewa)
                                        <option value="{{$sewa->harga_24_jam}}">{{$sewa->nama_kendaraan}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Tanggal Ambil</label>
                                        <input type="date" id="tanggal_ambil" name="tanggal_ambil"
                                            min="<?= date('Y-m-d') ?>" class="form-control"
                                            id="exampleFormControlInput1" placeholder="Tanggal Ambil" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Tanggal
                                            Pengembalian</label>
                                        <input type="date" id="tanggal_kembali" name="tanggal_kembali"
                                            min="<?= date('Y-m-d') ?>" class="form-control"
                                            id="exampleFormControlInput1" placeholder="Tanggal Kembali"
                                            onchange="hitungTotalHarga()" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">waktu sewa</label>
                                        <input type="time" id="waktu_ambil" name="waktu_ambil" class="form-control"
                                            id="exampleFormControlInput1" onchange="setKembali()" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">waktu
                                            Pengembalian</label>
                                        <input type="time" id="waktu_kembali" name="waktu_kembali" class="form-control"
                                            id="exampleFormControlInput1" required>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-5">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Harga Total</label>
                                        <input type="text" name="total_harga" id="total_harga" class="form-control"
                                            id="exampleFormControlInput1" placeholder="Harga Total" readonly required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Foto KTP</label>
                                        <input type="file" name="foto_ktp" accept=".png, .jpg, .jpeg"
                                            class="form-control" id="exampleFormControlInput1" placeholder="Nama"
                                            required>
                                    </div>
                                </div>
                            </div>


                            <div class="col">
                                <label for="exampleFormControlInput1" class="form-label">metode pembayaran</label>
                                <select class="form-select" id="buktiSelect" name="status_bayar"
                                    aria-label="Default select example" required onchange="toggleInputs()">
                                    <option selected disabled value="">-- Pilih metode --</option>
                                    <option value="2">cash</option>
                                    <option value="1">transfer</option>
                                </select>
                            </div>

                            <div class="row" id="cashInputContainer" style="display: none;">
                                <div class="col-5">
                                    <div class="mb-3">
                                        <label for="cash_input" class="form-label">Input Cash</label>
                                        <input type="number" name="bukti_tf" class="form-control" placeholder="Amount">
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="buktiInputContainer" style="display: none;">
                                <div class="col-5">
                                    <div class="mb-3">
                                        <label id="bukti" for="exampleFormControlInput1" class="form-label">Bukti
                                            Transfer</label>
                                        <input type="file" name="bukti_tf" accept=".png, .jpg, .jpeg"
                                            class="form-control" id="exampleFormControlInput1" placeholder="Nama">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary"><i
                                    class="fa-solid fa-floppy-disk mr-2"></i>Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
        function hitungTotalHarga() {
            const hargaSewa = parseFloat(document.getElementById('harga_sewa').value);
            const selectElement = document.getElementById('harga');
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const hargaSopir = parseFloat(selectedOption.getAttribute('harga')); // Corrected this line

            const tanggalAwal = new Date(document.getElementById('tanggal_ambil').value);
            const tanggalAkhir = new Date(document.getElementById('tanggal_kembali').value);

            const selisihHari = Math.round((tanggalAkhir - tanggalAwal) / (1000 * 60 * 60 * 24));
            // Check if the selected option is "tidak menggunakan"
            if (selectedOption.value === "0") {
                const totalHarga = (hargaSewa * selisihHari);
                document.getElementById('total_harga').value = totalHarga.toFixed(3);
            } else {
                const totalHarga = (hargaSewa * selisihHari) + (hargaSopir * selisihHari);
                document.getElementById('total_harga').value = totalHarga.toFixed(3);
            }

        }


        function setKembali() {
            var ambil = document.getElementById("waktu_ambil").value;
            var ambilTime = new Date("1970-01-01T" + ambil + ":00");
            var kembaliTime = new Date(ambilTime.getTime());
            var kembali = kembaliTime.toTimeString().slice(0, 5);
            document.getElementById("waktu_kembali").value = kembali;
        }
        </script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
        // Add an event listener to the select dropdown using jQuery
        $(document).ready(function() {
            $('#buktiSelect').change(function() {
                const selectedValue = $(this).val();

                // Toggle the visibility of the input fields based on the selected value
                if (selectedValue === '1') {
                    $('#buktiInputContainer').show();
                    $('#cashInputContainer').hide();
                } else {
                    $('#buktiInputContainer').hide();
                    $('#cashInputContainer').show();
                }
            });

            // On page load, trigger the change event to set the initial state of the input fields
            $('#buktiSelect').trigger('change');
        });
        </script>

        <script>
        function toggleHargaForm() {
            var sopirSelect = document.getElementById("sopirSelect");
            var hargaForm = document.getElementById("hargaForm");

            if (sopirSelect.value === "tidak_menggunakan_sopir") {
                hargaForm.style.display = "none";
            } else {
                hargaForm.style.display = "block";
            }
        }
        </script>

      

    </div>

    @endsection