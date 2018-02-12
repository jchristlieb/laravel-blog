<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class SidebarComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('archives', \App\Post::archives());
        $view->with('tags', \App\Tag::all());
    }
}
