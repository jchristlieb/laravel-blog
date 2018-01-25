<!doctype html>
<html lang="{{ app()->getLocale() }}">

@include('partials.head')

<body>

<div class="container">

    @include('partials.nav')

    <main role="main" class="container">

        <div class="row">

            <div class="col-md-8 blog-main">

                @yield('content')

            </div>

            <aside class="col-md-4 blog-sidebar">

                @include('blog.sidebar')

            </aside>

        </div>
    </main>

    @include('partials.footer')

</div>

</body>

</html>