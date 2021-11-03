@extends('layouts/main')
@section('konten')
<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><i class="fas fa-tachometer-alt"></i>&nbsp;Dashboard&nbsp; / &nbsp;Data Barang</li>
    </ol>
    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addItem"><i class="fa fa-plus"></i>&nbsp;Add Item</a>
    <button type="button" class="btn btn-success"><i class="fas fa-file-pdf"></i>&nbsp;Export PDF</button>
    <div class="card mb-4 mt-2">
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Merk</th>
                        <th>Stock</th>
                        <th>Harga jual</th>
                        <th>Harga beli</th>
                        <th>Laba</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Barang as $barang)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$barang->name}}</td>
                        <td>{{$barang->merk}}</td>
                        <td>{{$stok=$barang->stock}}</td>
                        <td>Rp. {{$hj=$barang->harga_jual}}</td>
                        <td>Rp. {{$hb=$barang->harga_beli}}</td>
                        <td>Rp. {{$hj-$hb}}</td>
                        <td><button type="button" class="btn btn-warning" id="btn-edit-barang" 
                            data-bs-toggle="modal" 
                            data-bs-target="#editItem"
                            data-id="{{$barang->id}}"
                            data-name="{{$barang->name}}"
                            data-merk="{{$barang->merk}}"
                            data-stock="{{$barang->stock}}"
                            data-harga_jual="{{$barang->harga_jual}}"
                            data-harga_beli="{{$barang->harga_beli}}"
                            ><i class="fa fa-edit"></i></button>
                            <a href="item/delete/{{$barang->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Modal Tambah item --}}
<div class="modal fade" id="addItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-box-open"></i> ADD Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid px-4">
                    <form action="/item/create" method="POST" enctype="multipart/form-data" class="mr-8">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Barang</label>
                            <input type="text" class="form-control" required="required" name="name"><br>
                        </div>
                        <div class="form-group">
                            <label for="merk">Merk</label>
                            <input type="text" class="form-control" required="required" name="merk"><br>
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="text" class="form-control" required="required" name="stock"><br>
                        </div>
                        <div class="form-group">
                            <label for="harga_jual">Harga Jual</label>
                            <input type="text" class="form-control" required="required" name="harga_jual"><br>
                        </div>
                        <div class="form-group">
                            <label for="harga_beli">Harga beli</label>
                            <input type="text" class="form-control" required="required" name="harga_beli"><br>
                        </div>
                    </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mt-3">Add Item</button>
                        <button type="submit" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            
        </div>
    </div>
</div>
{{-- Tutup tambah item --}}

{{-- Modal Edit item --}}
<div class="modal fade" id="editItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-box-open"></i> Edit Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid px-4">
                    <form action="{{route('update.item')}}" method="POST" enctype="multipart/form-data" class="mr-8">
                        @csrf
                        <input type="hidden" class="form-control" name="id" id="edit-id"><br>
                        <div class="form-group">
                            <label for="name">Nama Barang</label>
                            <input type="text" class="form-control" name="name" id="edit-name"><br>
                        </div>
                        <div class="form-group">
                            <label for="merk">Merk</label>
                            <input type="text" class="form-control" name="merk" id="edit-merk"><br>
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="text" class="form-control" name="stock" id="edit-stock"><br>
                        </div>
                        <div class="form-group">
                            <label for="harga_jual">Harga Jual</label>
                            <input type="text" class="form-control" name="harga_jual" id="edit-harga_jual"><br>
                        </div>
                        <div class="form-group">
                            <label for="harga_beli">Harga beli</label>
                            <input type="text" class="form-control" name="harga_beli" id="edit-harga_beli"><br>
                        </div>
                    </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mt-3">Edit Item</button>
                        <button type="submit" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            
        </div>
    </div>
</div>
{{-- Tutup Edit user --}}
@endsection