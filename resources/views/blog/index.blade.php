@extends('layout.master')

@section('content')

    @foreach($posts as $post)

        <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
                <h2 class="mb-0">
                    <a class="text-dark" href="/blog/{{ $post->slug }}">{{ $post->title }}</a>
                </h2>
                <p class="mb-1 text-muted">{{ $post->created_at->toFormattedDateString()  }} by {{ $post->user->name
                }}</p>
                <p class="card-text mb-auto">{{ $post->abstract }}</p>
                <a href="/blog/{{ $post->slug }}">Continue reading</a>
            </div>
        </div>

    @endforeach

@endsection
