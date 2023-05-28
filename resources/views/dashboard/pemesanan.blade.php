@extends('dashboard.layouts.app')

@section('content')

@include('sweetalert::alert')

 <div class="main-panel">
          <div class="content-wrapper">
           <div class="row">
              <div class="col-md mb-4 mb-lg-0 stretch-card transparent pb-3">
                <div class="card card-light-blue">
                  <div class="card-body">
                     <h3 class="mb-4"><i class="fa-solid fa-info mr-2"></i>Total Biaya Pemesanan</h3>
                      <p class="fs-30 mb-2">Rp. {{$formattedPrice}}</p>
                  </div>
                </div>
            </div>    
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                 <div class="card">
                  <div class="card-body">
                    <!-- Button trigger modal -->
                    <a href="/tambah-pemesanan" class="btn btn-primary"><i class="fa-solid fa-list-check pr-2"></i>Tambah Pemesanan</a>
                    <div class="table-responsive">
                      <table class="table table-striped table-borderless">
                        <thead>
                          <tr>
                            <th>Nama Pemesan</th>
                            <th>Kendaraan</th>
                            <th>Tujuan</th>
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
                            <td>{{$pemesanan->nama_pelanggan}}</td>
                            <td class="font-weight-bold">{{$pemesanan->nama_kendaraan}}</td>
                            <td>{{$pemesanan->tujuan}}</td>
                            <td>{{$pemesanan->tanggal_ambil}}</td>
                            <td>{{$pemesanan->tanggal_kembali}}</td>
                            <td>
                              <!-- Button trigger modal -->
                              <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$pemesanan->id_pemesanan}}">
                                <i class="fa-sharp fa-regular fa-address-card"></i>
                              </button>
                            </td>
                            <td>
                              @if($pemesanan->bukti_tf == null)
                                <div class="badge badge-danger">Belum Melakukan Pembayaran</div>
                              @else
                              <!-- Button trigger modal -->
                              <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#TransferModal{{$pemesanan->id_pemesanan}}">
                                <i class="fa-solid fa-file-invoice-dollar"></i>
                               </button> 
                              @endif
                                
                            </td>
                            <td class="font-weight-medium">
                            @if($pemesanan->status == null)
                             <div class="badge badge-warning">Belum Melakukan Pembayaran</div>
                            @elseif($pemesanan->status == 1)
                              <div class="badge badge-success">Menunggu Persetujuan</div>
                            @else
                            <div class="badge badge-success">Disetujui</div>
                            @endif
                            </td>
                            <td>
                            @if($pemesanan->status == 1)
                            <a class="btn btn-success btn-sm upprove" data-id="{{$pemesanan->id_pemesanan}}" data-nama="{{$pemesanan->nama_pelanggan}}"><i class="fa-solid fa-check"></i></a>
                            @else
                              <a href="" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash-can"></i></a>
                            @endif
                            </td>
                          </tr>

                          <!-- Modal KTP -->
                          <div class="modal fade" id="exampleModal{{$pemesanan->id_pemesanan}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Foto KTP</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <img src="{{asset('storage/image/ktp/'.$pemesanan->foto_ktp)}}" alt="Image Kendaraan" width="450px" height="300px">
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- Modal Transfer -->
                          <div class="modal fade" id="TransferModal{{$pemesanan->id_pemesanan}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Bukti Transfer</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <img src="{{asset('storage/image/transfer/'.$pemesanan->bukti_tf)}}" alt="Image Kendaraan" width="450px" height="300px">
                                </div>
                              </div>
                            </div>
                          </div>

                          <script>
                            $('.upprove').click(function(){
                                var pemesananid = $(this).attr('data-id');
                                var nama = $(this).attr('data-nama');
                                swal({
                                    title: "Apa kamu yakin ?",
                                    text: "Kamu akan setujui penyewaan atas nama "+nama+" ",
                                    icon: "warning",
                                    buttons: true,
                                    dangerMode: true,
                                    })
                                    .then((willUpprove) => {
                                    if (willUpprove) {
                                        window.location = "/approve/"+pemesananid+""
                                        swal("Data berhasil diupprove", {
                                        icon: "success",
                                        });
                                    } else {
                                        swal("Data batal diupprove");
                                    }
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