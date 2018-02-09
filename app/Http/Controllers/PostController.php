<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class PostController.
 */
class PostController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::latest()
            ->with('user')
            ->filter(request(['month', 'year']))
            ->get();

        // this code has been refactored to archive method in post.php
        /*$archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();*/


        return view('blog.index', compact('posts'));
    }

    /**
     * @param $slug string
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->with('comments')->first();

        return view('blog.show', ['post' => $post]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store()
    {
        $this->validate(request(), [
            'title'    => 'required|max: 80',
            'abstract' => 'required|string',
            'body'     => 'required|min: 20',
        ]);

        // create a new post using the request data
        $post = new Post();

        $post->title = request('title');
        $post->slug = str_slug(request('title'));
        $post->abstract = request('abstract');
        $post->body = request('body');
        $post->user_id = auth()->id();
        // save it to the database

        $post->save();

        // make a proper redirect and e.g. show a success message

        return redirect('/');
    }
}
