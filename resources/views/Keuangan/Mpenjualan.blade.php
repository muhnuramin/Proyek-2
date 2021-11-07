@extends('layouts/main')
@section('konten')
<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><i class="fas fa-shopping-cart"></i>&nbsp;Dashboard&nbsp;
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
                    <form>
                        <div class="form-group row mt-2">
                            <label for="id" class="col-sm-3 col-form-label">
                                <h6>Code</h6>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="id" onkeyup="autofill()"
                                    placeholder="code">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="name" class="col-sm-3 col-form-label">
                                <h6>Nama</h6>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="name"
                                    placeholder="nama" disabled>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="harga_jual" class="col-sm-3 col-form-label">
                                <h6>Harga</h6>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="harga_jual"
                                    placeholder="harga" disabled>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="jumlah" class="col-sm-3 col-form-label">
                                <h6>QTY</h6>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="jumlah"
                                    placeholder="QTY">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">
                                <h6>Total</h6>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="inputEmail3"
                                    placeholder="total" disabled>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary mb-2">Tambah Penjualan</button>
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
                            
                        </tbody>
                    </table>
                    <div class="harga">
                        <b>Rp.</b>1000000
                    </div>
                    <button type="button" class="btn btn-success mb-2"><i class="fas fa-file-pdf"></i>&nbsp;Cetak Nota</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection