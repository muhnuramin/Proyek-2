<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Penjualan</title>
    <style>
        * {
            font-family: "consolas", sans-serif;
        }
        p {
            display: block;
            margin: 3px;
            font-size: 10pt;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        html, body {
                width: 70mm;
        }
        @media print{
            @page{
                margin: 0;
                size: 75mm 
            }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="text-center">
        <h3 style="margin-bottom: 5px;">HANSTECH computer service</h3>
        <p>Jl.Raya Gopa'an SambungAnyar Kec.Dukun,Kab.Gresik</p>
    </div>
    <br>
    <table width="100%" style="border:none">
        @foreach ($Penjualan as $p)
        <tr>
            <td colspan="3">{{$p->barang()->first()->name}}</td>
        </tr>
        <tr>
            <td>{{$stok=$p->qty}} x Rp. {{$harga=$p->barang()->first()->harga_jual}}</td>
            <td></td>
            <td class="text-right">Rp. {{$stok*$harga}}</td>
        </tr>
        @endforeach
    </table>
    <p class="text-center">-----------------------------------</p>
    <table width="100%" style="border: 0;">
        <tr>
            <td>Total Harga:</td>
            <td class="text-right">Rp. {{$countTotal}}</td>
        </tr>
    </table>
    <div>
        <p style="float: left;">{{$tanggalAkhir}}</p>
        <p style="float: right">{{ Auth::user()->name }}</p>
    </div>
    <div class="clear-both" style="clear: both;"></div>
    <p>No.000{{$p->id_Penjualan}}</p>
    <br>
    <p class="text-center">===================================</p>
    <p class="text-center">===================================</p>
    <p class="text-center">-- TERIMA KASIH --</p>
    <p class="text-center">===================================</p>
    <script>
        let body = document.body;
        let html = document.documentElement;
        let height = Math.max(
                body.scrollHeight, body.offsetHeight,
                html.clientHeight, html.scrollHeight, html.offsetHeight
            );

        document.cookie = "innerHeight=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "innerHeight="+ ((height + 50) * 0.264583);
    </script>
</body>
</html>