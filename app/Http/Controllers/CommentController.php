<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Comment;
use \App\Post;

class CommentController extends Controller
{

    public function store(Post $post)

    {

        $post->comments()->create([
           'body' => request('body'),
            'post_id' => $post->id
        ]);

        return back();

    }

}
