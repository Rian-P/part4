@extends('dashboard.layouts.app')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        
                        <form action="/tambah-pengeluaran" class="form-car pt-4" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col">
                                <label for="exampleFormControlInput1" class="form-label">nama pengeluaran</label>
                                <select class="form-select"  name="nama_pengeluaran"
                                    aria-label="Default select example" >
                                    <option selected disabled value="">-- Pilih pengeluaran  --</option>
                                    <option value="gantisparepart">ganti sparepart</option>
                                    <option value="servicerutin ">service rutin</option>
                                    <option value="pajak">pajak</option>
                                    <option value="lainnya">lainnya..</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                    <label  class="form-label">keterangan</label>
                                    <input type="text" class="form-control" name="keterangan"
                                         placeholder="keterangan"  >
                                </div>
                               
                                <div class="mb-3">
                                    <label  class="form-label">total</label>
                                    <input type="text" class="form-control" name="total_pengeluaran"
                                         placeholder="total"  required>
                                </div>
                                <button type="submit" class="btn btn-primary"><i
                                        class="fa-solid fa-floppy-disk mr-2"></i>Simpan</button>
                        </form>
                     
                    <div class="table-responsive">
                        <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>nama pengeluaran</th>
                                    <th>keterangan</th>
                                    <th>total harga</th>
                                    <th>tanggal </th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach($pengeluaran as $item)
                                <tr>
                                    <td>
                                        {{$item->nama_pengeluaran}}
                                    </td>
                                    <td>
                                        {{$item->keterangan}}
                                    </td>
                                    <td> {{$item->total_pengeluaran}}</td>
                                    <td> {{$item->created_at}}</td>
                                    <td> 
                                    <a href="{{ route('hapuspengeluaran', ['id' => $item->id]) }}">Delete</a>

                                     
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
    </div>
</div>
@endsection