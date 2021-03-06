<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post)
    {

        // validate the post request
        $this->validate(request(), [
            'name'    => 'required|string',
            'website' => 'nullable|url',
            'body'    => 'required|min: 5',
            ]);

        // initiate a new comment
        $comment = new Comment();

        // assign the form fields to comment attributes
        $comment->body = request('body');
        $comment->post_id = $post->id;
        $comment->website = request('website');
        $comment->name = request('name');

        // save the comment to DB
        $comment->save();

        return back();
    }
}
