@extends('dashboard.layouts.app')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        @if (Auth::check() && Auth::user()->level == 'Sopir')
        <!-- <div class="row">
            @foreach($schedule as $data)
            <div class="col-md">
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>INFORMASI !</strong> Anda Mempunyai Jadwal Menyupir Pada Tanggal {{\Carbon\Carbon::parse($data->tanggal_ambil)->format('d F Y')}} Jam {{$data->waktu_ambil}} Dengan Pemesan Atas Nama <strong>{{$data->nama_pelanggan}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            </div>
             @endforeach
          </div> -->
        <div class="row">
            @foreach($schedule as $data)
            @php
            $tanggalAmbil = \Carbon\Carbon::parse($data->tanggal_ambil);
            $hariSebelumnya = \Carbon\Carbon::now()->subDay();
            $diffInDays = $tanggalAmbil->diffInDays($hariSebelumnya);
            @endphp
            @if($diffInDays == 1)
            <div class="col-md">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>INFORMASI !</strong> Anda Mempunyai Jadwal Menyupir Pada Tanggal
                    {{ $tanggalAmbil->format('d F Y') }} Jam {{ $data->waktu_ambil }} Dengan Pemesan Atas Nama
                    <strong>{{ $data->nama_pelanggan }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        @else
        @endif

        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        @if (Auth::check() && Auth::user()->level == 'Super Admin')
                        <h3 class="font-weight-bold">Selamar Datang, {{Auth::user()->nama}}</h3>
                        @else
                        <h3 class="font-weight-bold">Selamar Datang, {{Auth::user()->nama}}</h3>
                        @endif
                        <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span
                                class="text-primary">3 unread alerts!</span></h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card tale-bg">
                    <div class="card-people mt-auto">
                        <img src="images/dashboard/people.svg" alt="people">
                        <div class="weather-info">
                            <div class="d-flex">
                                <div>
                                    <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                                </div>
                                <div class="ml-2">
                                    <h4 class="location font-weight-normal">Kota Tegal</h4>
                                    <h6 class="font-weight-normal">Indonesia</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (Auth::check() && Auth::user()->level == 'Super Admin' || Auth::user()->level == 'Admin' )
            <div class="col-md-6 grid-margin transparent">
                <div class="row">
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body">
                                <p class="mb-4">Jumlah Users</p>
                                <p class="fs-30 mb-2">{{$total_users}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <div class="card-body">
                                <p class="mb-4">Total Kendaraan</p>
                                <p class="fs-30 mb-2">{{$total_kendaraan}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body">
                                <p class="mb-4">Pesanan Terkonfirmasi</p>
                                <p class="fs-30 mb-2">{{$total_terkonfirmasi}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 stretch-card transparent">
                        <div class="card card-light-danger">
                            <div class="card-body">
                                <p class="mb-4">Pesanan Pending</p>
                                <p class="fs-30 mb-2">{{$total_pending}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>



    </div>

    @endsection