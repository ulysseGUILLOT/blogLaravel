@extends('_base')

@section('title')
    Liste des articles
@endsection

@section('content')
    <div class="container text-center">
        <div class="row justify-content-between align-items-center">
            <div class="col-auto me-auto">
                <h1 class="my-5">Liste des articles</h1>
            </div>
            @auth()
                <div class="col-auto">
                    <a href="{{ route('blog.create') }}" class="btn btn-custom">Nouveau post</a>
                </div>
            @endauth
        </div>
    </div>



    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($posts as $post)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('img/logoPiment.png') }}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id]) }}"
                               class="custom-link">{{$post->title}}</a>
                        </h5>
                        <p class="card-text">Catégorie : <strong>{{$post->category?->name}}</strong></p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Dernière modification : {{$post->updated_at->format('d/m/Y')}}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $posts->links() }}
@endsection
