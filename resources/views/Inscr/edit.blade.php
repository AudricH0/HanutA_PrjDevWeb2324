@extends('Layouts.default_with_navbar')

@section('x-head')
    <style>
        .table .x-first-column {
            padding-left: 40px;
        }
    </style>
    <title>Projet de dev web - Inscriptions</title>
@endsection

@section('content')

    @component('components.edit-inscr-form', ['allEpr' => $allEpr, 'epr' => $epr, 'allEtudIn' => $allEtudIn, 'allEtudNotIn' => $allEtudNotIn]) @endcomponent

@endsection
