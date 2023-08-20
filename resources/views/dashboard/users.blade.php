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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="fa-solid fa-user-plus pr-2"></i>Tambah Users
                        </button>
                        <div class="table-responsive">
                            <table id="tabel-data" class="table table-striped table-bordered" width="100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No HP</th>
                                        <th>Level</th>
                                        <th>Status</th>
                                        <th>action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    @if ($user->level === 'User' || $user->level === 'Sopir')
                                    <tr>
                                        <td>
                                            @if($user->image == 'None')
                                            <img src="data:image/jpeg;base64,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"
                                                alt="Image Profil" width="100px" height="100px">
                                            @else
                                            <img src="{{asset('storage/image/users/'.$user->image)}}" alt="Image Profil"
                                                width="100px" height="100px">
                                            @endif
                                        </td>
                                        <td>{{$user->nama}}</td>
                                        <td class="font-weight-bold">{{$user->email}}</td>
                                        <td>{{$user->no_hp}}</td>
                                        <td class="font-weight-medium">
                                            <div class="badge badge-success">{{$user->level}}</div>
                                        </td>
                                        <td class="font-weight-medium">
                                            <div class="badge badge-success btn-lg">{{$user->status}}</div>
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->

                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#Modal{{$user->id}}">
                                                <i class="fa-solid fa-user"></i>
                                            </button>

                                        </td>
                                    </tr>
                                    @else
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Users</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/add-users" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="exampleFormControlInput1"
                                    placeholder="Username" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" id="exampleFormControlInput1"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="exampleFormControlInput1"
                                    placeholder="Email" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">No HP</label>
                                <input type="text" class="form-control" name="no_hp" id="exampleFormControlInput1"
                                    placeholder="No HP" pattern="[0-9]*" maxlength="16" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Level</label>
                                <select class="form-select" name="level" aria-label="Default select example" required>
                                    <option selected disabled value="">-- Pilih Level --</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Sopir">Sopir</option>
                                    <option value="User">User</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Status</label>
                                <select class="form-select" name="status" aria-label="Default select example" required>
                                    <option selected disabled value="">-- Pilih Status --</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Non Aktif">Non Aktif</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control"
                                    id="exampleFormControlInput1" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary"><i
                                    class="fa-solid fa-floppy-disk mr-2"></i>Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>




    </div>
    @foreach($users as $user)
    <!-- Modal -->
    <div class="modal fade" id="Modal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel1">Sopir</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/edit-users/{{$user->id}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <select class="form-select" name="status" aria-label="Default select example" required>
                                <option value="aktif" {{ $user->status === 'aktif' ? 'selected' : '' }}>aktif</option>
                                <option value="non-aktif" {{ $user->status === 'non-aktif' ? 'selected' : '' }}>
                                    non-aktif</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    


    <script>
    $('.hapusUser').click(function() {
        var usersid = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');
        swal({
                title: "Apa kamu yakin ?",
                text: "Kamu akan hapus user atas nama " +
                    nama +
                    " ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willUpprove) => {
                if (willUpprove) {
                    window.location = "/edit-users/{id}" +
                        usersid + ""
                    swal("Data berhasil dihapus", {
                        icon: "success",
                    });
                } else {
                    swal("Data batal diupprove");
                }
            });
    });
    </script>


    @endsection