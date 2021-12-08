<!DOCTYPE html>
<html>

<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan Artikel</h5>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Merk</th>
                <th>Stock</th>
                <th>Harga_jual</th>
                <th>Harga_beli</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach($barang as $a)
            <tr>
                <td>{{$a->id_barang}}</td>
                <td>{{$a->name}}</td>
                <td>{{$a->merk}}</td>
                <td>{{$a->stock}}</td>
                <td>{{$a->harga_jual}}</td>
                <td>{{$a->harga_beli}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>