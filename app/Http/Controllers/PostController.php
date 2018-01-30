<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()

    {

        $posts = Post::latest()->get();

        return view('blog.index', compact('posts'));

    }

    public function show(Post $post)

    {

        // route model binding
        return view('blog.show', compact('post'));

    }

    public function create()

    {

        return view('blog.create');

    }

    public function store()

    {

        $this->validate(request(), [
            'title' => 'required|max: 80',
            'abstract' => 'required|string',
            'body' => 'required|min: 20',
        ]);

        // create a new post using the request data
        // dd(request()->all());

        $post = new Post;

        $post->title = request('title');
        $post->slug = str_slug(request('title'));
        $post->abstract = request('abstract');
        $post->body = request('body');

        // save it to the database

        $post->save();

        // make a proper redirect and e.g. show a success message

        return redirect('/');
    }
}
