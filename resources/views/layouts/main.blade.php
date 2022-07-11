<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nur Catering - {{ $title }}</title>
    @include('layouts.style')

</head>

<body>
    <div id="app">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- header -->
        @include('layouts.header')
        <div id="main">
            <!-- content -->
            @yield('content')

            <!-- footer -->
            @include('layouts.footer')
        </div>
    </div>

    <!-- Sweet alert -->
    @include('sweetalert::alert')

    <!-- script -->
    @include('layouts.script')
</body>

</html>