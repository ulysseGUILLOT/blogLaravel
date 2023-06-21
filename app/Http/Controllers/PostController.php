<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Pagination\Paginator;

class PostController extends Controller
{
    public function index(): Paginator
    {
        return \App\Models\Post::paginate(50);
    }

    public function show(string $slug, string $id): RedirectResponse | Post
    {
        $post = \App\Models\Post::findOrFail($id);
        if ($post->slug !== $slug) {
            return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        }

        return $post;
    }
}
