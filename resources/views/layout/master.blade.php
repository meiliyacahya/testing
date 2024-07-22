<!DOCTYPE html>
<html>
<head>
    <title>School Scheduler</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @include('components.navbar')
    <div class="container">
        @yield('content')
    </div>
    @include('components.footer')
</body>
</html>
