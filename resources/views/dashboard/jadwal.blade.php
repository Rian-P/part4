@extends('dashboard.layouts.app')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if(auth()->user()->level=="Sopir")
                        <div class="table-responsive">
                            <table id="tabel-data" class="table table-striped table-bordered" width="100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Kendaraan</th>
                                        <th>Tanggal Ambil</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Waktu</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($response as $jadwal) 
                                    @if($jadwal->status == 2)                    
                                    <tr>
                                        <td>{{$jadwal->nama_pelanggan}}</td>
                                        <td>{{$jadwal->kendaraan}}</td>
                                        <td>{{$jadwal->tanggal_ambil}}</td>
                                        <td>{{$jadwal->tanggal_kembali}}</td>
                                        <td>{{$jadwal->waktu_ambil}}</td>
                                        <td>
                                            <a  class="btn btn-success p-2 selesai" data-id="{{$jadwal->pemesananId}}" data-nama="{{$jadwal->nama_pelanggan}}" ><i class="fa-solid fa-thumbs-up"></i></a>
                                        </td>          
                                    </tr>
                                    @elseif($jadwal->status == 3)
                                    <tr>
                                        <td>{{$jadwal->nama_pelanggan}}</td>
                                        <td>{{$jadwal->kendaraan}}</td>
                                        <td>{{$jadwal->tanggal_ambil}}</td>
                                        <td>{{$jadwal->tanggal_kembali}}</td>
                                        <td>{{$jadwal->waktu_ambil}}</td>
                                        <td>
                                             <div class="badge badge-success">Misi Selesai</div>
                                        </td>          
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                        @else
                     
                        <div class="table-responsive">
                            <table id="tabel-data" class="table table-striped table-bordered" width="100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Kendaraan</th>
                                        <th>Sopir</th>
                                        <th>Tanggal Ambil</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Waktu</th>
                                        <th>Total Harga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jadwal as $jadwal)
                                    <tr>
                                        <td>
                                            {{$jadwal->nama_pelanggan}}
                                        </td>
                                        <td> {{$jadwal->nama_kendaraan}}</td>
                                        <td class="font-weight-bold">{{$jadwal->sopir}}</td>
                                        <td>{{$jadwal->tanggal_ambil}}</td>
                                        <td>{{$jadwal->tanggal_kembali}}</td>
                                        <td>{{$jadwal->waktu_kembali}}</td>
                                        <td class="font-weight-medium">
                                            <div class="badge badge-success">Rp.{{$jadwal->total_harga}}</div>
                                        </td>
                                        <td>
                                            <form id="printForm" method="post"
                                                action="{{ route('print', ['id_pemesanan' => $jadwal->id_pemesanan]) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-lg p-2 m-2">
                                                    <i class="fa fa-file-pdf"></i>
                                                </button>
                                            </form>

                                            <!-- <a href="/print/{{$jadwal->id_pemesanan}}" class="btn btn-primary btn-sm"><i
                                                    class="fa-solid fa-file-pdf"></i></a> -->
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script>
        $('.selesai').click(function() {
            var jadwalid = $(this).attr('data-id');
            var nama = $(this).attr('data-nama');
            swal({
                    title: "Selesai",
                    text: "Pemesanan Dengan Nama " +
                        nama +
                        " Telah Selesai",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willHapus) => {
                    if (willHapus) {
                        window.location = "/selesai/" +
                        jadwalid + ""
                        swal("Misi Berhasil Diselesaikan", {
                            icon: "success",
                        });
                    } else {
                        swal("Data batal diupprove");
                    }
                });
        });
        </script>


    @endsection