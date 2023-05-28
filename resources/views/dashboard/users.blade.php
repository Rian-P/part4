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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <i class="fa-solid fa-user-plus pr-2"></i>Tambah Users
                    </button>
                    <div class="table-responsive">
                      <table class="table table-striped table-borderless">
                        <thead>
                          <tr>
                            <th>Image</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Level</th>
                            <th>Status</th>
                          </tr>  
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                          <tr>
                            <td>
                              <img src="{{asset('storage/image/users/'.$user->image)}}" alt="Image Profil" width="100px" height="100px">
                            </td>
                            <td>{{$user->nama}}</td>
                            <td class="font-weight-bold">{{$user->email}}</td>
                            <td>{{$user->no_hp}}</td>
                            <td class="font-weight-medium"><div class="badge badge-success">{{$user->level}}</div></td>
                            <td class="font-weight-medium"><div class="badge badge-success">{{$user->status}}</div></td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal -->
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
                        <input type="text" class="form-control" name="nama" id="exampleFormControlInput1" placeholder="Username" required>
                      </div>       
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" id="exampleFormControlInput1" required>
                      </div>       
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="Email" required>
                      </div>     
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No HP</label>
                        <input type="text" class="form-control" name="no_hp" id="exampleFormControlInput1" placeholder="No HP" required>
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
                        <input type="password"  name="password" class="form-control" id="exampleFormControlInput1" placeholder="Password" required>
                      </div>     
                      <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk mr-2"></i>Simpan</button>    
                    </form>
                  </div>
                </div>
              </div>
            </div>
           
          
          <!-- content-wrapper ends -->
          
        </div>
        
@endsection