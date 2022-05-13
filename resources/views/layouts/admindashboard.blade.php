<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    @include('partials.admin.head')
</head>

<body>
	  @include('partials.admin.header')
    @include('partials.admin.toastr')
     @include('partials.admin.sidebar')
        <main role="main">
        @yield('content')
        </main>
    
    @include('partials.admin.footer')
</body>

</html>