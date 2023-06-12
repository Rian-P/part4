@extends('dashboard.layouts.app')

@section('content')

 <div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            
        @if (Auth::check() && Auth::user()->level == 'Super Admin')
            <div class="col-md mb-4 mb-lg-0 stretch-card transparent pb-3">
                <div class="card card-light-blue">
                    <div class="card-body">
                        <h3 class="mb-4"><i class="fa-solid fa-info mr-2"></i>Total Biaya Pemesanan</h3>
                        <p class="fs-30 mb-2">Rp. {{$formattedPrice}}</p>
                    </div>
                </div>
            </div>
            @else
            @endif

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
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
                                   
                                </tbody>
                            </table>
                     </div>
             </div>
         </div>
     </div>
</div>


  

           
<!-- content-wrapper ends -->
<!-- partial:partials/_footer.html -->

<!-- partial -->
</div>
        
@endsection