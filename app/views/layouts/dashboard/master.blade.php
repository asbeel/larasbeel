<html>
    <head>
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/base.css') }}" media="all">

        <script src="{{ asset('assets/js/jquery-2.0.3.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/dashboard/base.js') }}"></script>
        <title>{{ (!empty($siteName)) ? $siteName : ""}} - {{$title}}</title>
    </head>
    <body>
        @include('layouts.dashboard.header')
        <div id="content">
            @yield('content')
        </div>
    </body>
</html>