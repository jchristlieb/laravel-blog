<nav class="navbar navbar-expand-sm navbar-white bg-white">
    <a class="navbar-brand" href="#">My Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03"
            aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/blog">Blog<span class="sr-only">(current)</span></a>
            </li>

        </ul>
        @auth
            <ul class="navbar-nav ml-auto">
                <li class="nav-link"><a href="/blog/create">Create Post</a></li>
                <li class="nav-link"><a href="{{route('logout')}}">Logout</a></li>
            </ul>
        @endauth
    </div>
</nav>
