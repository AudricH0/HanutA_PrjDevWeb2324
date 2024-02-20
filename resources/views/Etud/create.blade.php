@extends('Layouts.default_with_navbar')

@section('x-head')
    <title>Projet de dev web - Nouvel etudiant</title>
@endsection

@section('content')

    <x-etud-form :allClas="$allClas" :method="'POST'"/>

@endsection
