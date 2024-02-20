@extends('Layouts.default_with_navbar')

@section('x-head')
    <style>
        .table .x-first-column {
            padding-left: 20px;
        }
    </style>
    <title>Projet de dev web - Etudiants</title>
@endsection

@section('content')

    <x-etud-table :allEtud="$allEtud" />

@endsection
