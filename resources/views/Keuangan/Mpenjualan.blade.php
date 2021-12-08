@extends('layouts/main')
@section('konten')
<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><i class="fas fa-tachometer-alt"></i>&nbsp;Dashboard&nbsp;
            /&nbsp;Keuangan&nbsp;/ &nbsp;Penjualan</li>
    </ol>
    <div class="row">
        <div class="col-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-money-bill-wave-alt"></i>
                    Penjualan
                </div>
                <div class="container">
                    <form action="{{route('tambah-penjualan')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mt-2">
                            <label for="id_barang" class="col-sm-3 col-form-label">
                                <h6>Code</h6>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" name="id_barang" id="id_barang"
                                    onkeyup="autocomplete()" placeholder="code">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="name" class="col-sm-3 col-form-label">
                                <h6>Nama</h6>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" name="name" id="name"
                                    placeholder="nama" disabled>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="merk" class="col-sm-3 col-form-label">
                                <h6>Merk</h6>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" name="merk" id="merk"
                                    placeholder="merk" disabled>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="harga" class="col-sm-3 col-form-label">
                                <h6>Harga</h6>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" name="harga"
                                    id="harga" placeholder="harga" readonly>
                            </div>
                        </div>

                            <div class="col-sm-9 d-none">
                                <input type="text" class="form-control form-control-sm" name="hb" id="hb"
                                    placeholder="harga beli">
                            </div>
                        

                        <div class="form-group row mt-2">
                            <label for="jumlah" class="col-sm-3 col-form-label">
                                <h6>QTY</h6>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" name="qty" id="qty"
                                    placeholder="QTY">
                            </div>
                        </div>

                        <a href="#" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#pilih"><i class="fas fa-box-open"></i>&nbsp;Pilih</a>
                        <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-shopping-cart"></i>&nbsp;Tambah</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-shopping-cart"></i>
                    Detail Penjualan
                </div>
                <div class="container">
                    <table class="table table-bordered mt-2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($Penjualan as $penjualan)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$penjualan->Barang->name}}</td>
                                        <td>{{$penjualan->harga}}</td>
                                        <td>{{$penjualan->qty}}</td>
                                        <td>{{$total=$penjualan->subtotal}}</td>
                                        <td>
                                            <a href="penjualan/delete/{{$penjualan->id_penjualan}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                    <div class="harga" id="total">

                        <div class="form-group row mt-2">
                            <label for="harga" class="col-sm-3 col-form-label">
                                <h6>Dibayar</h6>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" name="dibayar" id="dibayar"
                                    value='{{$count}}' readonly/>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="bayar" class="col-sm-3 col-form-label">
                                <h6>Diterima</h6>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" name="bayar" id="bayar"
                                    placeholder="0">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="kembali" class="col-sm-3 col-form-label">
                                <h6>Kembali</h6>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" name="kembali" id="kembali"
                                    value="0" readonly>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-warning mb-2"><i class="fas fa-print"></i>
                        </button>
                    <button type="button" class="btn btn-warning mb-2"><i class="fas fa-save"></i>
                        </button>
                    <a href="penjualan/clear" class="btn btn-danger mb-2"><i class="fas fa-eraser"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Modal Tambah item --}}
<div class="modal fade bd-example-modal-lg" id="pilih" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-box-open"></i> Pilih Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="card mb-4 mt-2">
                <div class="modal-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Code</th>
                                <th>Nama</th>
                                <th>Merk</th>
                                <th>Harga Jual</th>
                                <th>Harga Beli</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Barang as $barang)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$barang->id_barang}}</td>
                                <td>{{$barang->name}}</td>
                                <td>{{$barang->merk}}</td>
                                <td>{{$barang->harga_jual}}</td>
                                <td>{{$barang->harga_beli}}</td>
                                <td>{{$barang->stock}}</td>
                                <td><button type="button" class="btn btn-success" id="btn-pilih-barang"
                                        data-bs-dismiss="modal" aria-label="Close"
                                        data-id_barang="{{$barang->id_barang}}" 
                                        data-name="{{$barang->name}}"
                                        data-merk="{{$barang->merk}}" 
                                        data-harga_jual="{{$barang->harga_jual}}"
                                        data-harga_beli="{{$barang->harga_beli}}"
                                        data-stock="{{$barang->stock}}">
                                        <i class="far fa-check-circle"></i>Pilih</button>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Tutup tambah item --}}
    @endsection