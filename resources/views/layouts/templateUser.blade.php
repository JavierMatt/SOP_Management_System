<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" type="image/png" href="{{ asset('css/form.css') }}">
    <title>SOP Management System</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/form.css') }}"> -->
    @vite('resources/css/app.css')
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
</head>   
<body>

    @include('partials.navbarUser')

    @yield('content')

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
    <script src="https://kit.fontawesome.com/5c31f508b8.js" crossorigin="anonymous"></script>
</body>
</html>
