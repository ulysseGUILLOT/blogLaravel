@extends('_base')

@section('title')
    {{$post->title}}
@endsection

@section('content')
    @auth()
        <a href="{{ route('blog.edit', ['post' => $post->id]) }}" class="btn btn-custom mt-4">Modifier</a>
    @endauth

    <article>
        <h3 class="mt-4">{{$post->title}}</h3>
        <div class="ms-4">
            <p>{!! $post->content !!}</p>
        </div>
    </article>
@endsection
