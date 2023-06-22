<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFilterRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        return view('blog.index', [
            'posts' => Post::paginate(2)
        ]);
    }

    public function create(): View
    {
        return view('blog.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $post = Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'slug' => Str::slug($request->input('title'))
        ]);
        return redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])->with('success', "Le post a bien été ajouté !");
    }

    public function show(string $slug, Post $post): View|RedirectResponse
    {
        if ($post->slug !== $slug) {
            return to_route('blog.show', ['slug' => $post->slug, 'post' => $post->id]);
        }

        return view('blog.show', [
            'post' => $post
        ]);
    }
}
