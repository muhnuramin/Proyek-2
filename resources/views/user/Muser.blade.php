@extends('layouts/main')
@section('konten')
<div class="container-fluid px-4">
    {{-- <h1 class="mt-4">User</h1> --}}
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><i class="fas fa-tachometer-alt"></i>&nbsp;Dashboard&nbsp; / &nbsp;User</li>
    </ol>
    <a href="user/add" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser">Add User</a>
    <button type="button" class="btn btn-success">Export PDF</button>
    <div class="card mb-4 mt-2">
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Roles</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($User as $user)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->roles}}</td>
                        <td>
                            <button type="button" class="btn btn-warning">Edit</button>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Modal Tambah user --}}
<!-- Modal -->
<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user"></i> ADD USER</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid px-4">
                    <form action="/user/create" method="POST" enctype="multipart/form-data" class="mr-8">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" required="required" name="name"><br>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" required="required" name="email"><br>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" encrypt="sha1" pattern=".{6,}" class="form-control" required="required"
                                name="password"><br>
                        </div>
                        <label for="roles">Roles</label>
                        <select class="form-select" name="roles">
                            <option value="Administrator">Admin</option>
                            <option value="Kasir">Kasir</option>
                            <option value="Barang">Barang</option>
                        </select>
                    </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mt-3">Add User</button>
                        <button type="submit" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            
        </div>
    </div>
</div>
{{-- Tutup tambah user --}}
@endsection