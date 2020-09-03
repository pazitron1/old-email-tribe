<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @yield('css')

    <script src="https://js.stripe.com/v3/"></script>

</head>
<body class="font-mont">
    <div id="app" v-cloak>
        @include('layouts.nav.manage')
        <div class="bg-gray-100">
            <div class="w-full">
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>
