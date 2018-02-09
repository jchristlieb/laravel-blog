@extends('layout.master')

@section('content')

    <h3>{{$tag->name}}</h3>
    <hr>
    @forelse($tag->posts as $post)

        <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
                <h2 class="mb-0">
                    <a class="text-dark" href="/blog/{{ $post->slug }}">{{ $post->title }}</a>
                </h2>
                <p class="mb-1 text-muted">
                    {{ $post->created_at->toFormattedDateString()  }} by {{ $post->user->name}}
                    in
                    @foreach($post->tags as $tag)
                        <a href="/blog/tags/{{$tag->slug}}">{{$tag->name}}</a>
                        @if(!$loop->last) , @endif
                    @endforeach

                </p>
                <p class="card-text mb-auto">{{ $post->abstract }}</p>
                <a href="/blog/{{ $post->slug }}">Continue reading</a>
            </div>
        </div>
    @empty
        <li class="list-group-item mb-2">
            <p>No Posts for this Tag</p>
        </li>
    @endforelse
@endsection
