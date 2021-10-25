@extends('layouts/main')
@section('konten')
<div class="container-fluid px-4">
    {{-- <h1 class="mt-4">User</h1> --}}
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><i class="fas fa-tachometer-alt"></i>&nbsp;Dashboard&nbsp; / &nbsp;User</li>
    </ol>
    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser"><i class="fa fa-user-plus"></i>&nbsp;Add User</a>
    <button type="button" class="btn btn-success"><i class="fas fa-file-pdf"></i>&nbsp;Export PDF</button>
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
                            <button type="button" class="btn btn-warning" id="btn-edit-user"
                            data-bs-toggle="modal" 
                            data-bs-target="#editUser"
                            data-id="{{$user->id}}"
                            data-name="{{$user->name}}"
                            data-email="{{$user->email}}"
                            data-password="{{$user->password}}"
                            data-roles="{{$user->roles}}"
                            >
                                <i class="fa fa-edit"></I>
                            </button>
                            <a href="user/delete/{{$user->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Modal Tambah user --}}
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

{{-- Modal edit user --}}
<div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user"></i> EDIT USER</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid px-4">
                    <form action="{{route('update.id')}}" method="POST" enctype="multipart/form-data" class="mr-8">
                        {{-- @method('PUT') --}}
                        @csrf
                        <input type="text" class="form-control" name="id" id="edit-id"><br>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" name="name" id="edit-name"><br>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="edit-email"><br>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" encrypt="sha1" pattern=".{6,}" class="form-control" name="password" id="edit-password"><br>
                        </div>
                        <label for="roles">Roles</label>
                        <select class="form-select" name="roles"  id="edit-roles">
                            <option value="Administrator">Admin</option>
                            <option value="Kasir">Kasir</option>
                            <option value="Barang">Barang</option>
                        </select>
                    </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-warning mt-3">Edit User</button>
                        <button type="submit" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            
        </div>
    </div>
</div>
{{-- Tutup edit user --}}
@endsection