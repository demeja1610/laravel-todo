<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ mix('images/favicon.ico') }}" type="image/x-icon" />

    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ mix('css/main.css') }}">
</head>

<body class="body">
    @auth
        @include('components.header.wrap')
    @endauth

    @yield('content')
</body>

</html>
