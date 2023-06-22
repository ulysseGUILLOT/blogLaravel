@extends('_base')

@section('title')
    Liste des articles
@endsection

@section('content')
    <div class="container text-center">
        <div class="row justify-content-between align-items-center">
            <div class="col-auto me-auto">
                <h1 class="mt-4">Liste des articles</h1>
            </div>
            <div class="col-auto">
                <a href="{{ route('blog.create') }}" class="btn btn-success">Nouveau post</a>
            </div>
        </div>
    </div>



    @foreach($posts as $post)
        <article>
            <h3 class="mt-4">{{$post->title}}</h3>
            <div class="ms-4">
                <p>{!! $post->content !!}</p>
                <a href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id]) }}"
                   class="btn btn-secondary">Lire la suite</a>
            </div>
        </article>
    @endforeach

    {{ $posts->links() }}
@endsection
