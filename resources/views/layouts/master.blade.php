<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/semantic.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{  asset('js/bootstrap.min.js') }}"></script>
    {{-- <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script> --}}

</head>

<body>
    <center>
        @include('layouts.navbar')
    </center>
    
    <div class="container" style="padding-top: 10%;">
            @yield('content')
    </div>


    <script src="{{  asset('js/jquery-3.1.1.min.js') }}"></script>
    {{-- <script src="{{ asset('js/semantic.min.js') }}"></script> --}}
    @stack('scripts')
</body>

</html>
