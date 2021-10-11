@extends('layouts/main')
@section('konten')
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
            <button type="submit" class="btn btn-primary mt-3">Add User</button>
        </form>
    </div>
@endsection