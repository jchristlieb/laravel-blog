@extends('layout.master')

@section('content')


        <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
                <h2 class="mb-0">{{ $post->title }}</h2>
                <div class="mb-1 text-muted">{{ $post->created_at->toFormattedDateString()  }}</div>
                <p class="card-text mb-auto">{{ $post->body }}</p>
            </div>
        </div>


@endsection