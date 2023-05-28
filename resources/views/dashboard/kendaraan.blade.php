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
                    <a href="/tambah-kendaraan" class="btn btn-primary"><i class="fa-solid fa-car pr-2"></i>Tambah Kendaraan</a>
                    <div class="table-responsive">
                      <table class="table table-striped table-borderless">
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
                              <img src="{{asset('storage/image/kendaraan/'.$kendaraan->image)}}" alt="Image Kendaraan" width="100px" height="100px">
                            </td>
                            <td class="font-weight-bold">{{$kendaraan->nama_kendaraan}}</td>
                            <td>{{$kendaraan->no_kendaraan}}</td>
                            <td>{{$kendaraan->tipe}}</td>
                            <td>{{$kendaraan->harga_24_jam}}</td>
                            <td>
                             <a href="" class="btn btn-warning btn-sm" ><i class="fa-sharp fa-regular fa-pen-to-square"></i></a>
                             <a class="btn btn-danger btn-sm hapus" data-id="{{$kendaraan->id_mobil}}" data-nama="{{$kendaraan->nama_kendaraan}}"  ><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                          </tr>
                        @endforeach
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <script>
                            $('.hapus').click(function(){
                                var kendaraanid = $(this).attr('data-id');
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
                                        window.location = "/hapus/"+kendaraanid+""
                                        swal("Data berhasil dihapus", {
                                        icon: "success",
                                        });
                                    } else {
                                        swal("Data batal dihapus");
                                    }
                                    });
                            });
                            
                        </script>

          
           
          
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         
          <!-- partial -->
        </div>
        
@endsection