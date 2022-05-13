<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    @include('partials.adminauth.header')
</head>

<body>
       @yield('content')

    @include('partials.adminauth.footer')

</body>

</html>