@extends('dashboard.layouts.app')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

            @if (Auth::check() && Auth::user()->level == 'Super Admin')
            <div class="col-md mb-4 mb-lg-0 stretch-card transparent pb-3">
                <div class="card card-light-blue">
                    <div class="card-body">
                        <h3 class="mb-4"><i class="fa-solid fa-info mr-2"></i>Total
                            Biaya Pemesanan</h3>
                        <p class="fs-30 mb-2">Rp. {{$formattedPrice}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md mb-4 mb-lg-0 stretch-card transparent pb-3">
                <div class="card card-light-blue">
                    <div class="card-body">
                        <h3 class="mb-4"><i class="fa-solid fa-info mr-2"></i>Total
                            pendapatan</h3>
                        <p class="fs-30 mb-2">Rp. {{$formattedResult}}</p>
                    </div>
                </div>
            </div>
            @else
            @endif
           
            <!-- Tampilan Form -->
            <form action="{{ route('calculateTotalPrice') }}" method="POST">
                @csrf
                <div class="row p-3">
                    <div class="col">
                        <div class="mb-3">
                            <input type="date" class="form-control" name="start_date" placeholder="Tanggal Ambil Awal"
                                required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <input type="date" class="form-control" name="end_date" placeholder="Tanggal Ambil Akhir"
                                required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Tampilan Hasil -->
            @if(isset($formattedTotal))
            <div>
                <h3>Total Harga: {{ $formattedTotal }}</h3>
            </div>
            @endif


            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if(isset($report))

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
                                <tbody>
                                    @foreach($report as $jadwal)
                                    <tr>
                                        <td>
                                            {{$jadwal->nama_pelanggan ?? $jadwal->nama_user}}
                                        </td>
                                        <td> {{$jadwal->nama_kendaraan}}</td>
                                        <td>{{$jadwal->nama_sopir ?? $jadwal->sopir}}</td>
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
                                        <td>

                                    </tr>
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
                                <tbody>
                                    @foreach($pemasukan as $jadwal)
                                    <tr>
                                        <td>
                                            {{$jadwal->nama_pelanggan ?? $jadwal->nama_user}}
                                        </td>
                                        <td> {{$jadwal->nama_kendaraan}}</td>
                                        <td>{{$jadwal->nama_sopir ?? $jadwal->sopir}}</td>
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
                                        <td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2>pengeluaran</h2>
                    <p class="fs-30 mb-2">Rp. {{$jumlah}}</p>
                    <div class="table-responsive">
                        <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>nama pengeluaran</th>
                                    <th>total harga</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tbody>
                                @foreach($pengeluaran as $item)
                                <tr>
                                    <td>
                                        {{$item->nama_pengeluaran}}
                                    </td>
                                    <td> {{$item->total_pengeluaran}}</td>
                                    <td> {{$item->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>      
        </div>

       
    </div>
</div>

    @endsection