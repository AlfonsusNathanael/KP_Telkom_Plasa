<!DOCTYPE html>
<html lang="en">

<head>
    <title>Costela Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/sidebar.css')}}" rel="stylesheet">

    <!-- Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Bootstrap Icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Datatables-->
    <link href="https:////cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">

    <meta charset="UTF-8">
</head>

<body>

    @include('layout.nav')
    @yield('body')


    <script src="{{asset('js/sidebar.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- JavaScript Bundle with Popper -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https:////cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" ></script>



    {{-- @include('sweetalert::alert') --}}


    {{-- <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script> --}}



    @yield('custom_script')



 </body>
 </html>
