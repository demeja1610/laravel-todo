<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ mix('images/favicon.ico') }}" type="image/x-icon" />
    <title>
        @hasSection('SeoTitle')
            @yield('SeoTitle')
        @else
            {!! __('Laraveltodo') !!}
        @endif
    </title>
    <link rel="stylesheet" href="{{ mix('css/main.css') }}">
</head>

<body class="body">
    <div class="wrapper">
        @include('components/notifications/wrap')

        @yield('content')
    </div>

    <script src="{{ mix('js/main.js') }}"></script>
</body>

</html>
