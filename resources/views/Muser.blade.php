@extends('layouts/main')
@section('konten')
<div class="container-fluid px-4">
    {{-- <h1 class="mt-4">User</h1> --}}
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><i class="fas fa-tachometer-alt"></i>&nbsp;Dashboard&nbsp; / &nbsp;User</li>
    </ol>
    <button type="button" class="btn btn-primary">Add user</button>
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


@endsection