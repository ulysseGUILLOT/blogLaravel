@extends('_base')

@section('title')
    Liste des articles
@endsection

@section('content')
    <h1 class="mt-4">Liste des articles</h1>

    @foreach($posts as $post)
        <article>
            <h3 class="mt-4">{{$post->title}}</h3>
            <div class="ms-4">
                <p>{!! $post->content !!}</p>
                <a href="{{ route('blog.show', ['slug' => $post->slug, 'id' => $post->id]) }}"
                   class="btn btn-secondary">Lire la suite</a>
            </div>
        </article>
    @endforeach

    {{ $posts->links() }}
@endsection
