<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>SI Pengolahan Toko</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        {{-- <link href="{{asset('https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css')}}" rel="stylesheet" /> --}}
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('css/customStyle.css')}}" rel="stylesheet" />
        <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js')}}" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html"><b>Pengelolahan Toko</b></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i>{{ Auth::user()->name }}</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            @can('manage-all')
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link hover {{Request::is('home') ? 'aktif' : ''}}" href="/">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            @endcan
                            <div class="sb-sidenav-menu-heading">Manage</div>
                            @can('manage-barang')
                            <a class="nav-link collapsed hover {{Request::is('barang') ? 'aktif' : ''}}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-box-open"></i></div>
                                Barang
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link hover {{Request::is('barang') ? 'aktif' : ''}}" href="/barang">Data Barang</a>
                                </nav>
                            </div>
                            @endcan
                            @can('manage-keuangan')
                            <a class="nav-link collapsed hover {{Request::is('penjualan') ? 'aktif' : ''}} {{Request::is('pembelian') ? 'aktif' : ''}} {{Request::is('laporan') ? 'aktif' : ''}}" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-money-bill-wave-alt"></i></div>
                                Keuangan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed hover {{Request::is('penjualan') ? 'aktif' : ''}}" href="/penjualan">
                                        Penjualan
                                    </a>
                                    {{-- <a class="nav-link col  --}}
                                    <a class="nav-link collapsed hover {{Request::is('laporan') ? 'aktif' : ''}}" href="/laporan">
                                        Data Keuangan
                                    </a>
                                </nav>
                            </div>
                            @endcan
                            @can('manage-all')
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link hover {{Request::is('user') ? 'aktif' : ''}}" href="/user">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                User
                            </a>
                            @endcan
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div><i class="fas fa-user-circle"></i>
                        {{ Auth::user()->roles }}
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    @yield('konten')
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-center small">
                            <div class="text-muted">Copyright &copy; Tugas Proyek2 2021</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
        <script src="{{asset('js/scripts.js')}}"></script>
        <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js')}}" crossorigin="anonymous"></script>
        <script src="{{asset('assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('assets/demo/chart-bar-demo.js')}}"></script>
        <script src='https://cdn.jsdelivr.net/npm/simple-datatables@latest' type="text/javascript"></script>
        {{-- <script src="{{asset('js/datatables-simple-demo.js')}}"></script> --}}
        <script>
            $(document).on('click','#btn-edit-user',function(){
                let id=$(this).data('id');
                let name=$(this).data('name');
                let email=$(this).data('email');
                let password=$(this).data('password');
                let roles=$(this).data('roles');
                
                $('#edit-id').val(id);
                $('#edit-name').val(name);
                $('#edit-email').val(email);
                $('#edit-password').val(password);
                $('#edit-roles').val(roles);
            });

            $(document).on('click','#btn-edit-barang',function(){
                let id=$(this).data('id');
                let name=$(this).data('name');
                let merk=$(this).data('merk');
                let stock=$(this).data('stock');
                let harga_jual=$(this).data('harga_jual');
                let harga_beli=$(this).data('harga_beli');
                
                $('#edit-id').val(id);
                $('#edit-name').val(name);
                $('#edit-merk').val(merk);
                $('#edit-stock').val(stock);
                $('#edit-harga_jual').val(harga_jual);
                $('#edit-harga_beli').val(harga_beli);
            });
        </script>
        <script>
            $(document).on('click','#btn-pilih-barang',function(){
                let id_barang=$(this).data('id_barang');
                let name=$(this).data('name');
                let merk=$(this).data('merk');
                let harga_jual=$(this).data('harga_jual');
                let harga_beli=$(this).data('harga_beli');
                let stock=$(this).data('stock');
                
                $('#id_barang').val(id_barang);
                $('#name').val(name);
                $('#merk').val(merk);
                $('#harga').val(harga_jual);
                $('#hb').val(harga_beli);
                $('#stock').val(stock);
            });
        </script>
        <script>
            let harga=document.getElementById('dibayar').value;
            $('#diterima').keyup(
                function() {
                    let bayar=$('#diterima').val();
                    let total=parseFloat(bayar)-parseFloat(harga);
                    $('#kembali').val(total);
                }
            );
        </script>
        <script>
            var value_kode = document.getElementById('id_barang').value;
            $("#id_barang").keyup(function(){
                console.log("id_barang = "+$('#id_barang').val())
                $.ajax({
                url: '/api/barang/'+$('#id_barang').val(),
                success: function(data){
                    $('#name').val(data['name']);
                    $('#merk').val(data['merk']);
                    $('#harga').val(data['harga_jual']);
                    $('#hb').val(data['harga_beli']);
                    console.log(data['name']);
                }
                });
            })
        </script>
        <script>
            $(document).on('click','#saveBtn',function(){
                var dibayar = document.getElementById('dibayar').value;
                var diterima = document.getElementById('diterima').value;
                var kembali = document.getElementById('kembali').value;
                $.ajax({
                url: '/penjualan/save',
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    subtotal: dibayar,
                    diterima: diterima,
                    kembali: kembali
                },
                success: function(data){
                    location.reload();
                    // alert('Success')
                }
                });
            })
        </script>
        <script>
            const dataTable1 = new simpleDatatables.DataTable("#tabel1");
            $('#detail-laporan').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var tanggal = button.data('tanggal') // Extract info from data-* attributes\
            var modal = $(this)
            dataTable1.init({
            searchable: true,
            fixedHeight: false,
            });
            modal.find('.modal-title').text('Detail Laporan Tanggal ' + tanggal)
            $.ajax({
                url: '/api/laporan/'+tanggal,
                type: 'get',
                success: function(data){
                    dataTable1.rows().add(data);
                }
            });
            })
            $('#detail-laporan').on('hidden.bs.modal', function (e) {
                dataTable1.destroy();
            })
        </script>
        <script>
            @if(Session::has('pesan'))
                toastr.{{Session::get('alert')}}("{{Session::get('pesan')}}");
            @endif
        </script>
        <script>
            const dataTable = new simpleDatatables.DataTable("#keuangan", {
            searchable: false,
            fixedHeight: true,
            })
        </script>
        <script>
            const dataTable = new simpleDatatables.DataTable("#data-barang", {
            searchable: false,
            fixedHeight: true,
            })
        </script>
    </body>
</html>
