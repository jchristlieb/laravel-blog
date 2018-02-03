<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

/**
 * Class PostController
 * @package App\Http\Controllers
 */
class PostController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::latest()->with('user')->get();

        return view('blog.index', compact('posts'));
    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Post $post)
    {
        $nrofcomments = $post->comments()->count();

        $comments = $post->comments()->latest()->get();

        return view('blog.show', compact('post', 'nrofcomments', 'comments'));
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
