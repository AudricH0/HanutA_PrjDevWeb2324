@extends('Layouts.default_with_navbar')

@section('x-head')
    <title>Projet de dev web - Edition Etudiant</title>
@endsection

@section('content')

    <div class="card p-4 mt-5">

        <x-etud-form :allClas="$allClas" :method="'PUT'" :etud="$etud"/>
        <p class="fs-3 mt-5">Liste des inscriptions de l'étudiant</p>
        <x-epr-table :allEpr="$allEpr"/>

    </div>

@endsection
