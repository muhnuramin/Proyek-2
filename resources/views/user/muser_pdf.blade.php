<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Laporan Barang</title>
</head>

<body>
    <style>
    .garis{
        background-color: grey;
        height: 3px;
    }
    
    </style>
    <center><h3>Laporan Data User Sistem</h3>
    <p>Hanstech computer service<br>
        Jl.Raya Gopa'an SambungAnyar Kec.Dukun,Kab.Gresik</p></center>
     <div class="garis"></div>   
    <br><br><table class="table">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Roles</th>
                <th scope="col">tanggal dibuat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $a)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$a->name}}</td>
                <td>{{$a->email}}</td>
                <td>{{$a->roles}}</td>
                <td>{{$a->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div align="right">
            <p class="mt-5">12-12-2021</p>
            <p class="mt-5">{{ Auth::user()->name }}</p>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>