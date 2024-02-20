@extends('Layouts.default_with_navbar')

@section('x-head')
    <title>Projet de dev web - Edition Classe</title>
@endsection

@section('content')

    <div class="card p-4 mt-5">

        <x-clas-form :clas="$clas" :method="'PUT'"/>

        <p class="fs-3 mt-5">Liste des étudiants</p>

        <x-etud-table :allEtud="$allEtuds"/>

    </div>

@endsection
