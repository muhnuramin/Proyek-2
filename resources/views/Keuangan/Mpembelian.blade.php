@extends('layouts/main')
@section('konten')
<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><i class="fas fa-tachometer-alt"></i>&nbsp;Dashboard&nbsp;
            /&nbsp;Keuangan&nbsp;/ &nbsp;Pembelian</li>
    </ol>
    <div class="row">
        <div class="col-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-money-bill-wave-alt"></i>
                    Pembelian
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

                        <a href="#" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#pilih"><i class="fas fa-box-open"></i>&nbsp;Pilih</a>
                        <button type="button" class="btn btn-primary mb-2"><i class="fas fa-shopping-cart"></i>&nbsp;Tambah Pembelian</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-shopping-cart"></i>
                    Detail Pembelian
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
                    <button type="button" class="btn btn-warning mb-2"><i class="fas fa-file-pdf"></i>&nbsp;Cetak Nota</button>
                    <button type="button" class="btn btn-warning mb-2"><i class="fas fa-save"></i>&nbsp;Simpan Transaksi</button>
                    <button type="button" class="btn btn-danger mb-2"><i class="fas fa-eraser"></i>&nbsp;Clear</button>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Modal Tambah item --}}
<div class="modal fade bd-example-modal-lg" id="pilih" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-box-open"></i> Pilih Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                </div>
            
        </div>
    </div>
</div>
{{-- Tutup tambah item --}}
@endsection