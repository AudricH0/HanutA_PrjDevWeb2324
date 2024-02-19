@extends('Layouts.default')

@section('x-head')
    <style>
        #register {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .card {
            min-width: 500px;
        }
    </style>

    <title>Projet de dev web : Création Admin</title>

@endsection

@section('x-body')

    <div class="container" id="register">

        <div class="card">
            <div class="card-header">
                <h5>Enregistrement administrateur</h5>
                @if(session('alert'))
                    <x-flash_message :type="session('alert.type')" :message="session('alert.message')"/>
                @endif
            </div>

            <div class="card-body">

                <form method="post">
                    @csrf
                    <div class="form mb-3 novalidate">
                        <label for="login" class="form-label">Nom de l'administrateur</label>
                        <input type="text" class="form-control @error('login') is-invalid @enderror" name="login" id="login"
                               value="{{ old('login') }}">
                        @error('login')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form mb-3 novalidate">
                        <label for="pswd" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="pswd"
                               name="password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form mb-3 novalidate">
                        <label for="pswd2" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="pswd2"
                               name="password_confirmation">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="submit" class="btn btn-primary" value="Se connecter">
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
