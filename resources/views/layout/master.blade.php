<!doctype html>
<html lang="{{ app()->getLocale() }}">

@include('partials.head')

<body>

<div class="container">

    @include('partials.nav')

    @yield('header')

    @yield('content')

    @include('partials.footer')

</div>

</body>

</html>