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
            <input type="title" class="form-control" id="title" name="title" placeholder="Enter post title"
                   value="{{old('title')}}" required>
        </div>

        <div class="form-group">
            <label for="abstract">Abstract</label>
            <textarea class="form-control"
                      id="abstract"
                      name="abstract"
                      placeholder="Enter abstract"
                      required>
                {{old('abstract')}}
            </textarea>
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control"
                      id="body"
                      name="body"
                      placeholder="Enter post body"
                      rows="10"
                      required>
                {{old('body')}}
            </textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Publish</button>
        </div>

        @include('partials.error')

    </form>


@endsection
