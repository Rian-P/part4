@extends('dashboard.layouts.app')

@section('content')

@include('sweetalert::alert')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <!-- Button trigger modal -->
                            <a href="/tambah-pemesanan" class="btn btn-primary mb-3"><i
                                    class="fa-solid fa-list-check pr-2"></i>Tambah Pemesanan</a>
                            <div class="table-responsive">
                                <table id="tabel-data" class="table table-striped table-bordered" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Pemesan</th>
                                            <th>Kendaraan</th>
                                            <th>Tujuan</th>
                                            <th>Sopir</th>
                                            <th>Tanggal Ambil</th>
                                            <th>Tanggal Kembali</th>
                                            <th>KTP</th>
                                            <th>Bukti Transfer</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pemesanan as $pemesanan)
                                        <tr>
                                        <td>{{$pemesanan->nama_pelanggan ?? $pemesanan->nama_user}}</td>

                                            <td class="font-weight-bold">{{$pemesanan->nama_kendaraan}}</td>
                                            <td>{{$pemesanan->tujuan}}</td>
                                            <td>{{$pemesanan->nama_sopir ?? $pemesanan->sopir}}
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{$pemesanan->id_pemesanan}}">
                                                    <i class="fa-solid fa-user"></i>
                                                </button>
                                            </td>
                                            <td>{{$pemesanan->tanggal_ambil}}</td>
                                            <td>{{$pemesanan->tanggal_kembali}}</td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-secondary btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal1{{$pemesanan->id_pemesanan}}">
                                                    <i class="fa-sharp fa-regular fa-address-card"></i>
                                                </button>
                                            </td>
                                            <td>
                                                @if($pemesanan->bukti_tf == null)
                                                <div class="badge badge-danger">Belum Melakukan Pembayaran</div>
                                                @else
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#TransferModal{{$pemesanan->id_pemesanan}}">
                                                    <i class="fa-solid fa-file-invoice-dollar"></i>
                                                </button>
                                                @endif
                                            </td>
                                            <td class="font-weight-medium">
                                                @if($pemesanan->status == null)
                                                <div class="badge badge-warning">Belum Melakukan Pembayaran</div>
                                                @elseif($pemesanan->status == 1)
                                                <div class="badge badge-warning">Menunggu Persetujuan</div>
                                                @else
                                                <div class="badge badge-success">Disetujui</div>
                                                @endif
                                            </td>
                                            <td>
                                                @if($pemesanan->status == 1)

                                                <form id="upproveForm" method="post"
                                                    action="{{ route('upprove', ['id_pemesanan' => $pemesanan->id_pemesanan]) }}">
                                                    @csrf
                                                    @method('put')
                                                    <button type="submit"
                                                        class="btn btn-success btn-lg upproveData p-2 m-2"
                                                        data-nama="{{ $pemesanan->nama_pelanggan }}">
                                                        <i class="fa-solid fa-check"></i></a>
                                                    </button>
                                                </form>
                                                @else
                                                
                                                <a href="/hapus-pemesanan/{{$pemesanan->id_pemesanan}}" class="btn btn-danger hapusPemesanan"><i
                                                        class="fa-solid fa-trash-can"></i></a>
                                                @endif
                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$pemesanan->id_pemesanan}}"
                                            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Sopir
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/edit-sopir/{{$pemesanan->id_pemesanan}}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-3">
                                                                <select class="form-select" name="sopir"
                                                                    aria-label="Default select example" required>
                                                                    @foreach($supir as $s)
                                                                    <option value="{{$s->id}}">{{$s->nama}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">
                                                                Update</button>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                        <!-- Modal KTP -->
                                        <div class="modal fade" id="exampleModal1{{$pemesanan->id_pemesanan}}"
                                            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Foto
                                                            KTP
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{asset('storage/image/ktp/'.$pemesanan->foto_ktp)}}"
                                                            alt="Image Kendaraan" width="450px" height="300px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal Transfer -->
                                        <div class="modal fade" id="TransferModal{{$pemesanan->id_pemesanan}}"
                                            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                            Bukti
                                                            Transfer</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{asset('storage/image/transfer/'.$pemesanan->bukti_tf)}}"
                                                            alt="Image Kendaraan" width="450px" height="300px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <script>
                                        $('.hapusPemesanan').click(function() {
                                            var usersid = $(this).attr('data-id');
                                            var namapemesan = $(this).attr('data-nama');
                                            swal({
                                                    title: "Apa kamu yakin ?",
                                                    text: "Kamu akan hapus user atas nama " +
                                                        namapemesan +
                                                        " ",
                                                    icon: "warning",
                                                    buttons: true,
                                                    dangerMode: true,
                                                })
                                                .then((willHapus) => {
                                                    if (willHapus) {
                                                        window.location = "/hapus-pemesanan/" +
                                                            usersid + ""
                                                        swal("Data berhasil dihapus", {
                                                            icon: "success",
                                                        });
                                                    } else {
                                                        swal("Data batal diupprove");
                                                    }
                                                });
                                        });
                                        </script>


                                        <!-- Kode JavaScript -->
                                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                        <script>
                                        $(document).ready(function() {
                                            $('.upproveData').click(function(e) {
                                                e.preventDefault();
                                                var nama = $(this).data('nama');

                                                Swal.fire({
                                                    title: 'Konfirmasi',
                                                    text: "Kamu akan setujui penyewaan atas nama " +
                                                        nama + "?",
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#d33',
                                                    cancelButtonColor: '#3085d6',
                                                    confirmButtonText: 'Konfirmasi',
                                                    cancelButtonText: 'Batal'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        $('#upproveForm').submit();
                                                    }
                                                });
                                            });
                                        });
                                        </script>

                                       
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>
                </div>
            </div>






            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->

        </div>

        @endsection