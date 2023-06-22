@extends('_base')

@section('title')
    Création d'un article
@endsection

@section('content')
    <form action="" method="post">
        @csrf
        <div>
            <input type="text" name="title" value="{{ old('title', 'titre') }}">
            @error('title')
            {{$message}}
            @enderror
        </div>
        <div>
            <input type="text" name="slug" value="{{ old('slug', 'slug') }}">
            @error('slug')
            {{$message}}
            @enderror
        </div>
        <div>
            <textarea name="content">{{ old('conent', 'contenu') }}</textarea>
            @error('content')
            {{$message}}
            @enderror
        </div>
        <button>Enregistrer</button>
    </form>
@endsection
