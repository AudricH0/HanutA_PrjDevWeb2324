@extends('Layouts.default_with_navbar')

@section('x-head')
    <title>Projet de dev web - Nouvelle Classe</title>
@endsection

@section('content')


    <div class="card p-4 mt-5">

        <x-epr-form :method="'POST'" />

    </div>

@endsection
