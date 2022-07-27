<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    @stack('styles')
    <!-- load scripts from external pages -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- @if (Auth::user() != null)
    @if (Auth::user()->role != 'admin')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    @else

    @endif
    @else
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    @endif --}}
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="asset('admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')">

    <title>Starter Project - @yield('title')</title>
</head>

<body
    class="@if (Auth::user() != null) @if (Auth::user()->role == 'admin') hold-transition sidebar-mini @endif @endif">

    @if (Auth::user() != null)
        @if (Auth::user()->role == 'user')
            @include('layouts.navbar')
            <br>
            <div class="container-fluid">
                @yield('content')
            </div>
            <br>
        @endif
    @else
        {{-- @include('layouts.navbar') --}}
    @endif
    @if (Auth::user() != null)
        @if (Auth::user()->role == 'admin')
            <div class="wrapper">
                @include('layouts.admin-navbar')
                @yield('content')
            </div>
        @endif
    @else
        <br>
        <div class="container-fluid">
            @yield('content')
        </div>
        <br>
    @endif
    @if (Auth::user() != null)
        @if (Auth::user()->role != 'admin')
            @include('layouts.footer')
        @endif
    @else
        @include('layouts.footer')
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/js/adminlte.min.js') }}"></script>
    @stack('scripts')
    <!-- load scripts from external pages -->
</body>

</html>
