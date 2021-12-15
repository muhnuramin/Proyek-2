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
                        <th>Tanggal</th>
                        {{-- <th>Name</th>    --}}
                        <th>Total Penjualan</th>
                        {{-- <th>Banyak penjualan</th> --}}
                        <th>Total Pengeluaran</th>
                        {{-- <th>Banyak Pengeluaran</th> --}}
                        <th>Pendapatan</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($laporan as $a)
                    {{-- a href="#" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#pilih"><i class="fas fa-box-open"></i>&nbsp;Pilih</a> --}}
                    <tr data-bs-toggle="modal" data-target="#detail-laporan" data-bs-target="#detail-laporan" data-tanggal="{{$a->Tanggal}}">
                        {{-- <th>{{$a->barang()->first()->name}}</th> --}}
                        <th>{{$a->Tanggal}}</th>
                        <th>{{$a->Total_Jual}}</th>
                        {{-- <th>{{$a->Banyak_Jual}}</th> --}}
                        <th>{{$a->Total_Beli}}</th>
                        <th>{{$a->Pendapatan}}</th>
                        {{-- <th>{{$a->barang()->first()->stock}}</th> --}}
                        {{-- <th>{{$jual-$beli}}</th> --}}
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- modal item --}}
<div class="modal fade bd-example-modal-lg" id="detail-laporan" tabindex="-1" aria-labelledby="modal-laporan"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-box-open"></i></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="card mb-4 mt-2">
                <div class="modal-body">
                    <table id="tabel1" class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Total Jual</th>
                                <th>Banyak Jual</th>
                                <th>Total Beli</th>
                                <th>Banyak Beli</th>
                                <th>Pendapatan</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
{{-- Tutup tambah item --}}
@endsection