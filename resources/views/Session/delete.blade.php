@extends('Layouts.default_with_navbar')

@section('x-head')
@endsection

@section('content')

    <div class="card p-4 mt-5">
        <form class="row g-3" method="post">
            @csrf
            <input type="hidden" name="_method" value="delete">
            <h4 class="my-4">Voulez-vous vraiment vous déconnecter ?</h4>
            <div class="row mt-5 mb-5">
                <div class="col-6 text-center">
                    <a href="/" class="btn btn-success">Revenir à l'accueil</a>
                </div>
                <div class="col-6">
                    <input type="submit" class="btn btn-outline-danger" value="Se déconnecter">
                </div>
            </div>
        </form>
    </div>

@endsection
