@extends('dashboard.layouts.app')

@section('content')

@include('sweetalert::alert')

<div class="main-panel">
  <div class="content-wrapper">

    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <!-- Button trigger modal -->
            <a href="/tambah-kendaraan" class="btn btn-primary mb-4"><i
                class="fa-solid fa-car pr-2"></i>Tambah
              Kendaraan</a>
            <table id="tabel-data" class="table table-striped table-bordered"
              width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>No Kendaraan</th>
                  <th>Nama Kendaraan</th>
                  <th>Tipe</th>
                  <th>Harga 24 Jam</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($kendaraan as $kendaraan)
                <tr>
                  <td>
                    <img
                      src="{{asset('storage/image/kendaraan/'.$kendaraan->image)}}"
                      alt="Image Kendaraan" width="100px" height="100px">
                  </td>
                  <td class="font-weight-bold">{{$kendaraan->nama_kendaraan}}</td>
                  <td>{{$kendaraan->no_kendaraan}}</td>
                  <td>{{$kendaraan->tipe}}</td>
                  <td>{{$kendaraan->harga_24_jam}}</td>
                  <td>
                    <form id="hapusForm" method="post"
                      action="{{ route('kendaraan.hapus', ['id_mobil' => $kendaraan->id_mobil]) }}"  >
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-lg hapus p-2 m-2"
                        data-nama="{{ $kendaraan->nama_kendaraan }}">
                        <i class="fa-solid fa-trash-can"></i>
                      </button>
                    </form>
                    <form method="get"
                      action="{{ route('update.view', ['id_mobil' => $kendaraan->id_mobil]) }}">
                      @csrf
                      @method('GET')
                      <button type="submit" class="btn btn-warning btn-lg p-2 m-2"
                        data-nama="{{ $kendaraan->nama_kendaraan }}">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </button>
                    </form>

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

            </div>
          </div>
        </div>
      </div>

      <!-- Kode JavaScript -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
        $(document).ready(function() {
            $('.hapus').click(function(e) {
                e.preventDefault();
                var nama = $(this).data('nama');

                Swal.fire({
                    title: 'Konfirmasi',
                    text: "Apakah Anda yakin ingin menghapus kendaraan '" + nama + "'?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#hapusForm').submit();
                    }
                });
            });
        });
        </script>

    </div>

    @endsection