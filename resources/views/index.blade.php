<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('favicon.ico') }}">
        <title>Simple News</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/slick.css') }}" rel="stylesheet">
        <link href="{{ asset('css/slick-theme.css') }}" rel="stylesheet">

        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>        
        <script src="{{ asset('js/app.js') }}"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        @include('include.navigation')
        @yield('content')
        @include('include.footer')
        
        <script src="{{ asset('js/slick.min.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
    </body>

</html>
