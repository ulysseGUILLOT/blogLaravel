@extends('_base')

@section('title')
    Connexion
@endsection

@section('content')
    <h1 class="my-4">Se connecter</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('auth.login') }}" method="post" class="vstack gap-3">

                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    @error("email")
                    {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" >
                    @error("password")
                    {{ $message }}
                    @enderror
                </div>

                <button class="btn btn-custom">Se connecter</button>

            </form>
        </div>
    </div>
@endsection
