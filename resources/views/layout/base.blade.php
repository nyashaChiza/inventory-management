<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>@yield('title')</title>
</head>

<body class='body card card-bordered rounded mx-auto col-md-8 py-4 my-4'>
    <header>
        @include('layout\header')
    </header>

    @if (session()->has('message'))
    <div class="alert alert-success mx-2" role="alert">
        {{ session('message') }}
      </div>
    @endif
    <div class='container'>
        <div class="content mx-1">
            @yield('content')
        </div>

    <footer>
        @include('layout\footer')
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
