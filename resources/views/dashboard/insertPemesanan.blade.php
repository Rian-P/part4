@extends('dashboard.layouts.app')

@section('content')

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
                            <input type="text" name="nama_pelanggan" class="form-control" id="exampleFormControlInput1" placeholder="Nama" required>
                          </div> 
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Tujuan</label>
                            <input type="text" name="tujuan" class="form-control" id="exampleFormControlInput1" placeholder="Tujuan" required>
                          </div> 
                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Sopir</label>
                            <select class="form-select" name="sopir" aria-label="Default select example" required>
                               <option selected disabled value="">-- Pilih Sopir --</option>
                               @foreach($supir as $supir)
                                <option value="{{$supir->nama}}">{{$supir->nama}}</option>
                                @endforeach
                            </select>
                         </div> 
                          <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nama Kendaraan</label>
                                    <select class="form-select" name="nama_kendaraan" aria-label="Default select example"  required>
                                      <option selected disabled value="">-- Pilih Kendaraan --</option>
                                      @foreach($kendaraan as $kendaraan)
                                        <option value="{{$kendaraan->nama_kendaraan}}">{{$kendaraan->nama_kendaraan}}</option>
                                      @endforeach
                                    </select>
                                  </div>  
                            </div>
                            <div class="col">
                                 <label for="exampleFormControlInput1" class="form-label">Harga Sewa</label>
                                  <select class="form-select" id="harga_sewa" name="harga_sewa" aria-label="Default select example"  required>
                                      <option selected disabled value="">-- Pilih Harga Sewa  --</option>
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
                                    <input type="date" id="tanggal_ambil" name="tanggal_ambil" min="<?= date('Y-m-d') ?>"  class="form-control" id="exampleFormControlInput1" placeholder="Tanggal Ambil" required>
                                  </div> 
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Tanggal Pengembalian</label>
                                    <input type="date" id="tanggal_kembali" name="tanggal_kembali" min="<?= date('Y-m-d') ?>"  class="form-control" id="exampleFormControlInput1" placeholder="Tanggal Kembali" onchange="hitungTotalHarga()" required>
                                  </div> 
                            </div>
                        </div> 
                         <div class="row">
                            <div class="col">
                                 <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Jam Pengambilan</label>
                                    <input type="time" id="waktu_ambil" name="waktu_ambil" class="form-control" id="exampleFormControlInput1" onchange="setKembali()" required>
                                  </div> 
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Jam Pengembalian</label>
                                    <input type="time" id="waktu_kembali" name="waktu_kembali" class="form-control" id="exampleFormControlInput1"  required>
                                  </div> 
                            </div>
                        </div> 
                        <div class="row">
                          <div class="col-5">
                            <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Harga Total</label>
                              <input type="text" type="number" name="total_harga" id="total_harga" class="form-control" id="exampleFormControlInput1" placeholder="Harga Total" readonly required>
                          </div> 
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-5">
                            <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Foto KTP</label>
                              <input type="file" name="foto_ktp" accept=".png, .jpg, .jpeg" class="form-control" id="exampleFormControlInput1" placeholder="Nama" required>
                          </div> 
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="col-5">
                            <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Bukti Transfer</label>
                              <input type="file" name="bukti_tf" accept=".png, .jpg, .jpeg"  class="form-control" id="exampleFormControlInput1" placeholder="Nama" required>
                          </div>
                          </div>
                        </div>
                      
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk mr-2"></i>Simpan</button>    
                    </form>
                  </div>
                </div>
              </div>
            </div>

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














          
          
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         
          <!-- partial -->
        </div>
        
@endsection