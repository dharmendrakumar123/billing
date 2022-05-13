<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    @include('partials.customer.head')
</head>

<body>
    @include('partials.customer.header')
    @include('partials.customer.toastr')

        @include('partials.customer.sidebar')
        <main role="main">
			@yield('content')
        </main>
    @include('partials.customer.footer')
</body>

</html>