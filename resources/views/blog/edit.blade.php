@extends('_base')

@section('title')
    Modification article
@endsection

@section('content')
    <form action="" method="post" class="">
        @csrf
        <div>
            <input type="text" name="title" value="{{ old('title', $post->title) }}">
            @error('title')
            {{$message}}
            @enderror
        </div>
        <div>
            <input type="text" name="slug" value="{{ old('slug', $post->slug) }}">
            @error('slug')
            {{$message}}
            @enderror
        </div>
        <div>
            <textarea name="content">{{ old('content', $post->content) }}</textarea>
            @error('content')
            {{$message}}
            @enderror
        </div>
        <button>Modifier</button>
    </form>
@endsection
