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
        <div class="bg-white border-b shadow border-gray-200 fixed top-0 inset-x-0 z-100">
            <div class="max-w-5xl mx-auto px-4 sm:px-6">
                <navbar></navbar>
            </div>
        </div>
        <!-- <progress-status></progress-status> -->
        <div class="bg-gray-100">
            <div class="max-w-5xl mx-auto px-4 sm:px-6">
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
