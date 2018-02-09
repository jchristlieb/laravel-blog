<?php

namespace App\Http\Controllers;

use App\Tag;

class TagController extends Controller
{
    public function show($slug)
    {
        $tag = Tag::where('slug', $slug)->with('posts')->first();

        return view('blog.tags.show', compact('tag'));
    }
}
