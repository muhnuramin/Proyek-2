@extends('layouts/main')
@section('konten')
<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><i class="fas fa-tachometer-alt"></i>&nbsp;Dashboard&nbsp;
            /&nbsp;Keuangan&nbsp;/ &nbsp;Data Keuangan</li>
    </ol>

    <p><b>Data Laporan Keuangan</b></p>
    <p>{{date('d F Y',strtotime($tanggalAwal))}} s/d {{date('d F Y',strtotime($tanggalAkhir))}}</p>
    <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addItem"><i class="far fa-clock"></i>&nbsp;Ubah Periode</a>
    <a href="#" target="_blank" class="btn btn-success btn-xs btn-flat"><i class="fa fa-file-excel"></i> Export PDF</a>
    <div class="card mb-4 mt-2">
        <div class="card-body">

            <table id="keuangan" class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Total Penjualan</th>
                        <th>Banyak penjualan</th>
                        <th>Total Pengeluaran</th>
                        <th>Banyak Pengeluaran</th>
                        <th>Pendapatan</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penjualans as $a)
                    <tr>
                        <th>{{$a->barang()->first()->name}}</th>
                        <th>{{$a->Total_Jual}}</th>
                        <th>{{$a->Banyak_Jual}}</th>
                        <th>{{$a->barang()->first()->total_beli}}</th>
                        <th>{{$a->barang()->first()->stock}}</th>
                        <th></th>
                        <th>{{$a->Tanggal_Jual}}</th>
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
                <h5 class="modal-title" id="exampleModalLabel"><i class="far fa-clock"></i> Set Periode</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid px-4">
                    <form action="/item/create" method="POST" enctype="multipart/form-data" class="mr-8">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tanggal Awal</label>
                            <input type="date" class="form-control" required="required" name="name"><br>
                        </div>
                        <div class="form-group">
                            <label for="merk">Tanggal Akhir</label>
                            <input type="date" class="form-control" required="required" name="merk"><br>
                        </div>
                    </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-warning mt-3">Set Periode</button>
                        <button type="submit" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            
        </div>
    </div>
</div>
{{-- Tutup tambah item --}}
@endsection