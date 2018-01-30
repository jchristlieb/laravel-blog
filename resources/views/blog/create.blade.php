@extends('layout.master')

@section('content')

    <header>

        <h1>Create a post</h1>

    </header>

    <hr>

    <form method="POST" action="/blog">

        {{ csrf_field() }}

        <div class="form-group">
            <label for="title">Title</label>
            <input type="title" class="form-control" id="title" name="title" placeholder="Enter post title" required>
        </div>

        <div class="form-group">
            <label for="abstract">Abstract</label>
            <textarea type="abstract" class="form-control" id="abstract" name="abstract"
                      placeholder="Enter abstract" required></textarea>
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea type="body" class="form-control" id="body" name="body" placeholder="Enter post body"
                      required></textarea>
        </div>

        <div class="form-group">
        <button type="submit" class="btn btn-primary">Publish</button>
        </div>

        @include('partials.error')

    </form>


@endsection
