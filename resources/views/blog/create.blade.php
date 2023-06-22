@extends('_base')

@section('title')
    Création d'un article
@endsection

@section('content')
    <form action="" method="post">
        @csrf
        <input type="text " name="title" value="Article de démonstration">
        <textarea name="content">Contenu de démonstration</textarea>
        <button>Enregistrer</button>
    </form>
@endsection
