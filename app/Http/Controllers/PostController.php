<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFilterRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(PostFilterRequest $request): View
    {
        return view('blog.index', [
            'posts' => Post::paginate(2)
        ]);
    }

    public function show(string $slug, string $id): View|RedirectResponse
    {
        $post = Post::findOrFail($id);
        if ($post->slug !== $slug) {
            return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        }

        return view('blog.show', [
            'post' => $post
        ]);
    }
}
