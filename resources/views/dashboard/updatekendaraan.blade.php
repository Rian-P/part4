@extends('dashboard.layouts.app')

@section('content')

 <div class="main-panel">
          <div class="content-wrapper">
          
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                 <div class="card">
                  <div class="card-body">
                    <div class="modal-header">
                        <h5 class="modal-title"><strong>Tambah Data Kendaraan</strong></h5>
                    </div>
                    <form action="{{ route('kendaraan.update', ['id' => $kendaraan->id]) }}" class="form-car pt-4" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Kendaraan</label>
                            <input type="text" class="form-control" name="nama_kendaraan" id="exampleFormControlInput1" placeholder="Nama Kendaraan" value="{{ $kendaraan->nama_kendaraan }}" required>
                          </div> 
                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Foto Kendaraan</label>
                            <input type="file" class="form-control" name="image" id="exampleFormControlInput1" placeholder="Foto Kendaraan" value="{{ $kendaraan->image }}" required>
                          </div> 
                          <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">No Kendaraan</label>
                                    <input type="text" class="form-control" name="no_kendaraan" id="exampleFormControlInput1" placeholder="No Kendaraan" value="{{ $kendaraan->no_kendaraan }}" required>
                                  </div> 
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Tipe</label>
                                    <select class="form-select" name="tipe" aria-label="Default select example" required>
                                      <option selected disabled value="">-- Pilih Tipe Kendaraan --</option>
                                      <option value="{{ $kendaraan->tipe }}"></option>
                                      <option value="Manual">Manual</option>
                                      <option value="Matic">Matic</option>
                                      <option value="Bus">Bus</option>
                                    </select>
                                  </div>  
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Max Penumpang</label>
                                    <input type="text" class="form-control" name="max_penumpang" id="exampleFormControlInput1" placeholder="Max Penumpang" value="{{ $kendaraan->max_penumpang }}" required>
                                  </div> 
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Tahun</label>
                                    <input type="text" class="form-control" name="tahun" id="exampleFormControlInput1" placeholder="Tahun" value="{{ $kendaraan->tahun }}" required>
                                  </div> 
                            </div>
                          </div> 
                          <div class="row">
                          </div>
                          <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Harga 24 Jam</label>
                                    <input type="text" class="form-control" name="harga_24_jam" id="exampleFormControlInput1" placeholder="Harga 24 Jam" value="{{ $kendaraan->harga_24_jam}}" required>
                                  </div> 
                            </div>
                          </div>
                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Deskripsi Kendaraan</label>
                                <input id="deskripsi" type="hidden" name="deskripsi" value="{{ $kendaraan->deskripsi }}" required>
                                <trix-editor input="deskripsi"></trix-editor>
                          </div> 
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk mr-2"></i>Simpan</button>    
                    </form>
                  </div>
                </div>
              </div>
            </div>

          
          
         
        </div>
        
@endsection