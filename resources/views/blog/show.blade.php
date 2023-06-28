@extends('_base')

@section('title')
    {{$post->title}}
@endsection

@section('content')
    <a href="{{ route('blog.edit', ['post' => $post->id]) }}" class="btn btn-danger mt-4">Modifier</a>
    <article>
        <h3 class="mt-4">{{$post->title}}</h3>
        <div class="ms-4">
            <p>{!! $post->content !!}</p>
        </div>
    </article>
@endsection
