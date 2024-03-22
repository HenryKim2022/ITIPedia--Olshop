<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title>
        @yield('title')
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ staticAsset('backend/assets/img/favicon.png') }}">

    <!-- App css -->
    @include('backend.inc.styles')

</head>

<body>

    <main class="tt-main-wrapper bg-secondary-subtle h-100">
        <!-- contents -->
        @yield('contents')
    </main>
</body>

</html>
