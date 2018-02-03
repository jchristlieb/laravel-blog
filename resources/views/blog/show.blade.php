@extends('layout.master')

@section('content')


    <div class="card flex-md-row mb-4 box-shadow h-md-250">
        <div class="card-body d-flex flex-column align-items-start">
            <h2 class="mb-0">{{ $post->title }}</h2>
            <p class="mb-1 text-muted">{{ $post->created_at->toFormattedDateString()  }} by {{ $post->user->name  }}</p>
            <p class="card-text mb-auto">{{ $post->body }}</p>
        </div>
    </div>

    @if($nrofcomments != 0)


        <h3>Comments</h3>
        <hr>

        <div class="comments">

            <ul class="list-group">

                @foreach($comments as $comment)


                    <li class="list-group-item mb-2">

                        <?php if ($comment->website == 'nullable') { ?>

                        <p>by <strong>{{ $comment->name }}</strong>, {{
                        $comment->created_at->diffForHumans()
                        }}</p>
                        <p>{{ $comment->body  }}</p>

                        <?php } else { ?>

                        <p>by <strong><a href="{{ $comment->website  }}" target="_blank">{{ $comment->name
                        }}</a></strong>, {{
                        $comment->created_at->diffForHumans()
                        }}</p>
                        <p>{{ $comment->body  }}</p>

                        <?php } ?>
                    </li>

                @endforeach

            </ul>

        </div>

    @endif

    <h3 class="mt-4">Join the conversation</h3>
    <hr>

    <form method="POST" action="/blog/{{ $post->slug }}/comments">

        {{ csrf_field() }}

        <div class="form-group">

            <input name="name" class="form-control" placeholder="Your name" required>

        </div>

        <div class="form-group">

            <input name="website" class="form-control" placeholder="Your website">

        </div>

        <div class="form-group">

            <textarea name="body" placeholder="Add your comment." class="form-control" required></textarea>

        </div>

        <div class="form-group">

            <button type="submit" class="btn btn-primary">Submit</button>

        </div>

        @include('partials.error')

    </form>


@endsection