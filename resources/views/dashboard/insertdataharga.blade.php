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
                        @foreach ($harga as $item)
    <form action="{{ route('update-dataharga', ['id' => $item->id]) }}" class="form-car pt-4" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama</label>
            <input type="number" name="harga" class="form-control"
                placeholder="harga" value="{{ $item->harga }}" required>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk mr-2"></i>Simpan</button>
    </form>
@endforeach


                    </div>
                </div>
            </div>
        </div>
        @endsection