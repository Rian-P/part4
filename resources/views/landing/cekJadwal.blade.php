@extends('landing.layouts.app')

@section('content')
@include('sweetalert::alert')

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="icon" type="image/png" sizes="56x56" href="images/icon/iconbg.png" />

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</head>

<body class="#">
   <h1>JADWAL TIDAK TERSEDIA</h1>

</body>

</html>
@endsection