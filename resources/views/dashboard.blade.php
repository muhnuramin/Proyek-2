@extends('layouts/main')
@section('konten')
<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><i class="fas fa-tachometer-alt"></i>&nbsp;Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg mb-4">
                <div class="card-body">Jumlah Barang</div>
                <div class="isi-card d-flex justify-content-end ">{{$countBarang}}</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link text-decoration-none" href="/barang">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg mb-4">
                <div class="card-body">Jumlah User</div>
                <div class="isi-card d-flex justify-content-end">{{$countUser}}</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link text-decoration-none" href="/user">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg mb-4">
                <div class="card-body">Pemasukkan</div>
                <div class="isi-card d-flex justify-content-end">Rp.{{$countlaporan}}</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link text-decoration-none" href="/laporan">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg mb-4">
                <div class="card-body">Pengeluaran</div>
                <div class="isi-card d-flex justify-content-end">Rp.{{$countlaporan2}}</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link text-decoration-none" href="/laporan">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Riwayat Penjualan
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No. </th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">subtotal</th>
                                <th scope="col">diterima</th>
                                <th scope="col">Kembalian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail_penjualan as $a)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$a->created_at}}</td>
                                    <td>Rp.{{$a->subtotal}}</td>
                                    <td>Rp.{{$a->diterima}}</td>
                                    <td>Rp.{{$a->kembali}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Tabel Barang Habis
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No. </th>
                                <th scope="col">Nama Brang</th>
                                <th scope="col">Harga Jual</th>
                                <th scope="col">Harga beli</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangs2 as $b)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$b->name}}</td>
                                    <td>{{$b->harga_jual}}</td>
                                    <td>{{$b->harga_beli}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection